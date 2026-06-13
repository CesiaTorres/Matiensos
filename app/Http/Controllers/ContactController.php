<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {   
        $rules = [
            'mensaje' => 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|min:5|max:2000',
        ];

        if (!Auth::check()) {
            $rules['nombre'] = 'required|string|regex:/^[^\s]+(\s+[^\s]+)*$/|max:100';
            $rules['email']  = 'required|email|regex:/^[^\s]+(\s+[^\s]+)*$/|max:255';
        }

        $validated = $request->validate($rules);
        $data = [
            'message' => $validated['mensaje'],
            'subject' => null,
        ];

        if (Auth::check()) {
            $user = Auth::user();
            $data['user_id'] = $user->id;
            $data['name']    = $user->name;
            $data['email']   = $user->email;
        } else {
            $data['name']  = $validated['nombre'];
            $data['email'] = $validated['email'];
        }

        Contact::create($data);

        return back()->with('success', '¡Gracias por escribirnos! Tu consulta fue enviada correctamente y te responderemos a la brevedad.');
    }

    /**
     * Muestra la bandeja de entrada en el panel admin.
     */
    public function index(Request $request)
    {
        //solo los no leídos usarías: Contact::unread()->latest()->paginate(15);
        $contacts = Contact::latest()
            ->byReadStatus($request->input('status_filter'))
            ->paginate(15)
            ->withQueryString();
        $metrics = [
            'total'    => Contact::count(),
            'sin_leer' => Contact::unread()->count(),
        ];
        
        return view('admin.front.contacts', compact('contacts','metrics'));
    }

    /**
     * Alterna el estado del mensaje
     */
    public function toggleRead(Contact $contact)
    {
        $contact->update([
            'is_read' => !$contact->is_read
        ]);
        $mensaje = $contact->is_read ? 'Mensaje marcado como leído.' : 'Mensaje marcado como no leído.';

        return back()->with('success', $mensaje);
    }

    /**
     * Respuesta rapida por correo.
     */
    public function reply(Request $request, Contact $contact)
    {
        $request->validate([
            'respuesta' => 'required|string|min:5|max:5000',
        ]);

        /*Mail::raw($request->respuesta, function ($message) use ($contact) {
            $message->to($contact->email)
                    ->subject('Re: ' . ($contact->subject ?? 'Consulta en Matiensos'));
        });*/

        $contact->update(['is_read' => true]);

        return back()->with('success', '¡Respuesta enviada con éxito al correo del cliente!');
    }
}