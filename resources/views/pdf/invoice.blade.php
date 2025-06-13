<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Fatura de pagamento</title>  
</head>
<body>
      <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
              /* font-family: DejaVu Sans, sans-serif; */
            /* font-family: 'Courier New', Courier, monospace; */
            font-size: 11px;
            line-height: 1.4;
            color: #000;
        }

        .document-border {
            border: 1px solid #000;
            padding: 10px;
            width: 280px;
            margin: 10px auto;
        }

        .text-center {
            text-align: center;
        }

        .section {
            margin: 10px 0;
        }

        .dashed-line {
            border-bottom: 1px dashed #000;
            margin: 6px 0;
        }

        .bold {
            font-weight: bold;
        }

        .indent {
            margin-left: 10px;
        }

        .spacer {
            margin-bottom: 20px;
        }

        .small {
            font-size: 10px;
        }

    </style>

    <div class="document-border">
       
        <div class="text-center">
            Recibo de confirmação de checkin<br>
            
        </div>

        <div class="dashed-line"></div>
        <div class="indent">Nome do cliente: <span class='bold'></span></div>

        
        <div class="dashed-line"></div>
        <div class="indent">Quantidade de dias reservados: 
           
           
        </div>

        <div class="dashed-line"></div>

        <div class="indent">Metodo de pagamento:  <sapn class='bold'></sapn> </div>
       
        <div class="dashed-line"></div>

        
        <div class="dashed-line"></div>

        <div class="indent">Total pago:</div>
        <div class="indent bold">
            Kz
        </div>

        <div class="dashed-line"></div>        

        <div class="spacer"></div>

        <div class="text-center small">
        
        </div>

        <div class="text-center small">
            Obrigado pela preferência!
        </div>
    </div>
</body>
</html>
