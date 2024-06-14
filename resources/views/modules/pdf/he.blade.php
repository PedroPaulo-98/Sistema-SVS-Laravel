<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>BPA - Paciente</title>
        <style>
            html {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
            }

            .content {
                margin: 10mm;
                width: 190mm;
                height: 257mm;
            }

            .title {
                float: left;
                padding-left: 48mm;
                width: 92mm;
                font-size: 9pt;
                font-weight: bold;
                text-align: center;
            }
            
            .block {
                margin-left: 140mm;
                width: 50mm;
                font-size: 9pt;
                font-weight: bold;
            }

            .information {
                width: 190mm;
                height: 12mm;
                border-bottom: 1px solid #000000;
                padding: 2px 0px 1mm 7px;
            }

            .identify {
                width: 190mm;
                height: 5mm;
                border-left: 1px solid #000000;
                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                font-size: 10pt;
                font-weight: bold;
                padding: 1px 0px 0px 5px;
            }

            .subtitle {
                width: 190mm;
                height: 5mm;
                border-left: 1px solid #000000;
                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                font-size: 10pt;
                font-weight: bold;
                text-align: center;
                padding: 1px 0px 0px 5px;
                background: rgb(245,195,195);
            }
        </style>
    </head>

    <body>    
        <div class="content">
            <div class="information">
                <div class="title">
                    GOVERNO DO ESTADO DO AMAPÁ<br>
                    SECRETARIA DE ESTADO DA SAÚDE<br>
                    HOSPITAL DE EMERGÊNCIA
                </div>
    
                <div class="block">
                    (<span style="color: #ffffff"> X </span>) AMB I - CLÍNICO<br>
                    (<span style="color: #ffffff"> X </span>) AMB II - TRAUMAS<br>
                    (<span style="color: #ffffff"> X </span>) INTERNAÇÃO
                </div>
            </div>

            <div class="identify">
                <div style="float: left; width: 130mm;">
                    DATA E HORA DE EMISSÃO:
                </div>

                <div style="margin-left: 130mm; width: 60mm;">
                    NÚMERO BPA:
                </div>
            </div>
            
            <div class="subtitle">
                INFORMAÇÕES DO PACIENTE
            </div>

            <div class="identify">
                <div style="float: left; width: 100mm;">
                    NOME:
                </div>

                <div style="margin-left: 100mm; width: 60mm;">
                    D. NASCIMENTO:
                </div>

                <div style="float: right; margin-left: 160mm; width: 30mm; background: red;">
                    IDADE:
                </div>
            </div>
            
            <div class="subtitle" style="float: left; width: 120mm;">
                PRESCRIÇÃO
            </div>

            <div class="subtitle" style="margin-left: 120mm; width: 70mm;">
                HORÁRIO
            </div>
        </div>
    </body>
</html>