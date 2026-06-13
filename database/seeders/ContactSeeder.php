<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Carbon\Carbon;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::truncate();
        // 1. Array manual de 6 mensajes de INVITADOS (Sin cuenta en la tienda)
        $invitados = [
            [
                'user_id' => null,
                'name'    => 'Cesia Torres',
                'email'   => 'cesiatorresj@gmail.com',
                'subject' => 'Duda sobre envíos',
                'message' => 'Hola, quería saber cuánto demora el envío a Corrientes Capital. ¡Gracias!',
                'is_read' => false,
                'created_at' => Carbon::now()->subHours(2), // Hace 2 horas
            ],
            [
                'user_id' => null,
                'name'    => 'Sofía Ramírez',
                'email'   => 'sofi.rami99@hotmail.com',
                'subject' => 'Ventas mayoristas',
                'message' => 'Buenas tardes. ¿Tienen lista de precios para compras por mayor? Me interesa revender los termos.',
                'is_read' => false,
                'created_at' => Carbon::now()->subDays(1), // Hace 1 día
            ],
            [
                'user_id' => null,
                'name'    => 'Diego Fernández',
                'email'   => 'diego_fer@yahoo.com',
                'subject' => 'Stock de mates',
                'message' => 'Vi en el catálogo el Mate Camionero Premium pero me aparece sin stock. ¿Saben cuándo vuelve a ingresar?',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'user_id' => null,
                'name'    => 'Julieta Gómez',
                'email'   => 'juligomez@gmail.com',
                'subject' => 'Medios de pago',
                'message' => '¿Aceptan tarjetas de crédito en cuotas sin interés? ¿O hacen descuento pagando por transferencia?',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(5),
            ],
            [
                'user_id' => null,
                'name'    => 'Martín Silva',
                'email'   => 'msilva.design@gmail.com',
                'subject' => 'Personalización',
                'message' => 'Hola equipo de Matiensos. ¿Hacen grabados láser en las bombillas de alpaca si compro para regalos empresariales?',
                'is_read' => false,
                'created_at' => Carbon::now()->subHours(5),
            ],
            [
                'user_id' => null,
                'name'    => 'Lucía Torres',
                'email'   => 'luci_torres@outlook.com',
                'subject' => 'Cambios y devoluciones',
                'message' => 'Hola, compré un termo la semana pasada para regalar, pero me equivoqué de modelo. ¿Se puede cambiar si está cerrado?',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(10),
            ],
        ];

        // 2. Array manual de 6 mensajes de CLIENTES (¡Ojo! Los user_id deben existir en tu tabla users)
        $clientes = [
            [
                'user_id' => 1, 
                'name'    => 'Administrador Matiensos', // Editá esto con un usuario que tengas en tu BD
                'email'   => 'admin@matiensos.com',
                'subject' => 'Prueba de sistema',
                'message' => 'Este es un mensaje de prueba enviado desde la cuenta de administrador para probar la bandeja de entrada.',
                'is_read' => false,
                'created_at' => Carbon::now()->subMinutes(15),
            ],
            [
                'user_id' => 2, 
                'name'    => 'Facundo Herrera',
                'email'   => 'facuh88@gmail.com',
                'subject' => 'Mi último pedido no llegó',
                'message' => 'Chicos, en el seguimiento del correo me figura como entregado, pero yo no recibí nada en mi domicilio. ¿Me ayudan?',
                'is_read' => false,
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'user_id' => 3, 
                'name'    => 'Micaela Sosa',
                'email'   => 'micasosa_95@hotmail.com',
                'subject' => 'Excelente calidad',
                'message' => 'Solo les escribía para agradecerles. Me llegó el Mate Imperial y es una locura la calidad que tiene. ¡Súper recomendados!',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(4),
            ],
            [
                'user_id' => 4, 
                'name'    => 'Tomás Álvarez',
                'email'   => 'tomi.alva@gmail.com',
                'subject' => 'Problema con la bombilla',
                'message' => 'Hola, la bombilla pico de loro que recibí ayer parece que está tapada, cuesta mucho que pase el agua. ¿Qué puedo hacer?',
                'is_read' => false,
                'created_at' => Carbon::now()->subHours(8),
            ],
            [
                'user_id' => 5, 
                'name'    => 'Valentina Castro',
                'email'   => 'valecastro.arq@gmail.com',
                'subject' => 'Garantía del termo',
                'message' => 'Hola, el Termo Clásico Verde que compré hace un mes no me mantiene la temperatura del agua. ¿Cómo es el tema de la garantía?',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(7),
            ],
            [
                'user_id' => 6, 
                'name'    => 'Emiliano Díaz',
                'email'   => 'emi_diaz10@yahoo.com',
                'subject' => 'Consulta sobre cuidado',
                'message' => '¿Tienen algún instructivo o video sobre cómo curar correctamente el mate de calabaza forrado en cuero? No quiero arruinarlo.',
                'is_read' => true,
                'created_at' => Carbon::now()->subDays(15),
            ],
        ];

        // Guardamos los invitados en la BD
        foreach ($invitados as $contacto) {
            Contact::create($contacto);
        }

        // Guardamos los clientes en la BD
        foreach ($clientes as $contacto) {
            Contact::create($contacto);
        }
    }
}