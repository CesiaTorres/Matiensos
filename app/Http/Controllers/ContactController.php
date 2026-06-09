<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {   
        /**
         * Procesa y guarda el formulario de contacto.
         */
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
    public function index()
    {
        // Si quisieras traer solo los no leídos usarías: Contact::unread()->latest()->paginate(15);
        $contacts = Contact::latest()->paginate(15);
        
        return view('admin.front.contacts', compact('contacts'));
    }

    /**
     * Cambia el estado del mensaje a "Leído" u "Oculto".
     */
    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Mensaje marcado como leído.');
    }

    /**
     * Manda el mensaje a la papelera.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Mensaje eliminado.');
    }
}