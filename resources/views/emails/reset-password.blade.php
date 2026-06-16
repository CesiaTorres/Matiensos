<div style="font-family: 'Segoe UI', Helvetica, Arial, sans-serif; background-color: #f8f9fa; padding: 40px 0; width: 100%; text-align: center;">
    <div style="max-width: 500px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border: 1px solid #e9ecef;">

        {{-- Encabezado / Logo y Nombre al lado --}}
        <div style="background-color: #ffffff; padding: 35px 20px 20px 20px; border-bottom: 1px solid #f1f3f5; text-align: center;">
            <table cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto; display: inline-block;">
                <tr>
                    <td style="vertical-align: middle; padding-right: 14px;">
                        <img src=https://i.postimg.cc/NMJjDHzq/icon-mate-logo.png
                            alt="Logo"
                            width="65"
                            height="65"
                            style="display: block; border: 0; outline: none; height: auto;">
                    </td>

                    <td style="vertical-align: middle; text-align: left;">
                        <span style="font-family: 'Segoe UI', Helvetica, Arial, sans-serif; color: #386150; font-size: 30px; font-weight: 800; letter-spacing: -0.5px; line-height: 1;">
                            Matiensos
                        </span>
                    </td>
                </tr>
            </table>
        </div>

        {{-- Contenido Principal --}}
        <div style="padding: 30px 40px; text-align: left;">
            <h2 style="margin: 0 0 15px 0; color: #343a40; font-size: 18px; font-weight: 600;">
                Recuperación de contraseña
            </h2>

            <p style="margin: 0 0 25px 0; color: #6c757d; font-size: 15px; line-height: 1.6;">
                Recibimos una solicitud para restablecer la contraseña de tu cuenta. Si no realizaste este pedido, podés ignorar este correo de forma segura.
            </p>

            {{-- Botón de Acción (Verde Matiensos) --}}
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/reset-password/' . $token) }}"
                    style="display: inline-block; background-color: #386150; color: #ffffff; font-weight: 600; font-size: 15px; padding: 12px 35px; text-decoration: none; border-radius: 8px; box-shadow: 0 4px 8px rgba(56, 97, 80, 0.2); transition: background-color 0.2s ease;">
                    Restablecer contraseña
                </a>
            </div>

            <p style="margin: 25px 0 0 0; color: #6c757d; font-size: 13px; line-height: 1.5; border-top: 1px solid #f1f3f5; padding-top: 20px;">
                Si tenés problemas con el botón, copiá y pegá este enlace en tu navegador web:<br>
                <a href="{{ url('/reset-password/' . $token) }}" style="color: #386150; text-decoration: underline; word-break: break-all;">
                    {{ url('/reset-password/' . $token) }}
                </a>
            </p>
        </div>

        {{-- Pie de página --}}
        <div style="background-color: #fafbfa; padding: 20px; text-align: center; border-top: 1px solid #f1f3f5;">
            <p style="margin: 0; color: #adb5bd; font-size: 12px;">
                © {{ date('Y') }} Matiensos. Todos los derechos reservados.
            </p>
        </div>

    </div>
</div>