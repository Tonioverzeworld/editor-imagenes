<?php

class PDF{

    private $imagen;
    private $formato;
    private $ruta;
    private $email;

    public function __construct($ruta, $formato, $imagen, $email)
    {
        $this->imagen = $imagen; 
        $this->formato = $formato;
        $this->ruta = $ruta;
        $this->email = $email;
    }


    public function generaPDF(){
        
        require('/var/www/html/dev/imagen-editor/funciones/fpdf/fpdf.php');
   
        $ruta_imagen = $this->ruta."/".$this->imagen;
    
        switch ($this->formato) {
            case 'formato1':

                $ancho_hoja = 210;
                $alto_hoja = 297;
                $margen = 20;
        
                //list($width, $height) = $this->resizeToFit($ruta_imagen, $ancho_hoja, $alto_hoja);
                
                $pdf = new FPDF('P', 'mm', array($ancho_hoja, $alto_hoja));
                $pdf->SetFont('Arial','B',10);
                $pdf->SetMargins($margen, $margen, $margen);
                $pdf->SetAutoPageBreak(true,$margen);
                $pdf->AddPage();
                $pdf->Image($ruta_imagen ,($ancho_hoja - 195)/2, ($alto_hoja - 280)/ 2, 195, 280);
                $archivo = $pdf->Output("", "S");

                $this->enviarEmail($archivo, $this->imagen, $ruta_imagen);

                break;
            case 'formato2':
                
                $ancho_hoja = 148.5;
                $alto_hoja = 297;
                $margen = 17;
        
                //list($width, $height) = $this->resizeToFit($ruta_imagen, $ancho_hoja, $alto_hoja);
                
                $pdf = new FPDF('P', 'mm', array($ancho_hoja, $alto_hoja));
                $pdf->SetFont('Arial','B',10);
                $pdf->SetMargins($margen, $margen, $margen);
                $pdf->SetAutoPageBreak(true,$margen);
                $pdf->AddPage();
                $pdf->Image($ruta_imagen ,($ancho_hoja - 136)/2, ($alto_hoja - 286)/ 2, 136, 286);
                $archivo = $pdf->Output("", "S");

                $this->enviarEmail($archivo, $this->imagen, $ruta_imagen);


                break;
            case 'formato3':
                
                $ancho_hoja = 210;
                $alto_hoja = 210;
                $margen = 20;
        
                //list($width, $height) = $this->resizeToFit($ruta_imagen, $ancho_hoja, $alto_hoja);
                
                $pdf = new FPDF('P', 'mm', array($ancho_hoja, $alto_hoja));
                $pdf->SetFont('Arial','B',10);
                $pdf->SetMargins($margen, $margen, $margen);
                $pdf->SetAutoPageBreak(true,$margen);
                $pdf->AddPage();
                $pdf->Image($ruta_imagen ,($ancho_hoja - 195)/2, ($alto_hoja - 195)/ 2, 195, 195);
                $archivo = $pdf->Output("", "S");

                $this->enviarEmail($archivo, $this->imagen, $ruta_imagen);


                break;
            case 'formato4':
                
                $ancho_hoja = 148.5;
                $alto_hoja = 210;
                $margen = 17;
        
                //list($width, $height) = $this->resizeToFit($ruta_imagen, $ancho_hoja, $alto_hoja);
                
                $pdf = new FPDF('P', 'mm', array($ancho_hoja, $alto_hoja));
                $pdf->SetFont('Arial','B',10);
                $pdf->SetMargins($margen, $margen, $margen);
                $pdf->SetAutoPageBreak(true,$margen);
                $pdf->AddPage();
                $pdf->Image($ruta_imagen ,($ancho_hoja - 136)/2, ($alto_hoja - 296)/ 2, 136, 296);
                $archivo = $pdf->Output("", "S");

                $this->enviarEmail($archivo, $this->imagen, $ruta_imagen);


                break;
            default:
                



                break;
        }


    }

    public function enviarEmail($archivo, $nombre, $ruta){

        require('/var/www/html/dev/imagen-editor/funciones/PHPMailer/PHPMailerAutoload.php');

        $body = '
        
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]-->
        <!--[if !IE]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title></title>
            <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
            <meta name="viewport" content="width=device-width" /><style type="text/css" emb-not-inline>
        @media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:40px !important;line-height:47px !important}.wrapper h2{}.wrapper h2{font-size:24px !important;line-height:32px !important}.wrapper h3{}.wrapper h3{font-size:20px !important;line-height:28px !important}.column{}.wrapper .size-8{font-size:8px !important;line-height:14px !important}.wrapper .size-9{font-size:9px !important;line-height:16px !important}.wrapper .size-10{font-size:10px !important;line-height:18px !important}.wrapper .size-11{font-size:11px !important;line-height:19px !important}.wrapper .size-12{font-size:12px !important;line-height:19px !important}.wrapper .size-13{font-size:13px !important;line-height:21px !important}.wrapper .size-14{font-size:14px !important;line-height:21px !important}.wrapper .size-15{font-size:15px !important;line-height:23px !important}.wrapper .size-16{font-size:16px !important;line-height:24px !important}.wrapper .size-17{font-size:17px !important;line-height:26px !important}.wrapper .size-18{font-size:18px !important;line-height:26px !important}.wrapper .size-20{font-size:20px !important;line-height:28px !important}.wrapper .size-22{font-size:22px !important;line-height:31px !important}.wrapper .size-24{font-size:24px !important;line-height:32px !important}.wrapper .size-26{font-size:26px !important;line-height:34px !important}.wrapper .size-28{font-size:28px !important;line-height:36px !important}.wrapper .size-30{font-size:30px !important;line-height:38px !important}.wrapper .size-32{font-size:32px !important;line-height:40px !important}.wrapper .size-34{font-size:34px !important;line-height:43px !important}.wrapper .size-36{font-size:36px !important;line-height:43px !important}.wrapper .size-40{font-size:40px !important;line-height:47px !important}.wrapper .size-44{font-size:44px !important;line-height:50px !important}.wrapper .size-48{font-size:48px !important;line-height:54px !important}.wrapper .size-56{font-size:56px !important;line-height:60px !important}.wrapper .size-64{font-size:64px !important;line-height:63px !important}}
        </style>
            <style type="text/css" emb-not-inline>
        body {
          margin: 0;
          padding: 0;
        }
        table {
          border-collapse: collapse;
          table-layout: fixed;
        }
        * {
          line-height: inherit;
        }
        [x-apple-data-detectors],
        [href^="tel"],
        [href^="sms"] {
          color: inherit !important;
          text-decoration: none !important;
        }
        .wrapper .footer__share-button a:hover,
        .wrapper .footer__share-button a:focus {
          color: #ffffff !important;
        }
        .btn a:hover,
        .btn a:focus,
        .footer__share-button a:hover,
        .footer__share-button a:focus,
        .email-footer__links a:hover,
        .email-footer__links a:focus {
          opacity: 0.8;
        }
        .preheader,
        .header,
        .layout,
        .column {
          transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;
        }
        .preheader td {
          padding-bottom: 8px;
        }
        .layout,
        div.header {
          max-width: 400px !important;
          -fallback-width: 95% !important;
          width: calc(100% - 20px) !important;
        }
        div.preheader {
          max-width: 360px !important;
          -fallback-width: 90% !important;
          width: calc(100% - 60px) !important;
        }
        .snippet,
        .webversion {
          Float: none !important;
        }
        .column {
          max-width: 400px !important;
          width: 100% !important;
        }
        .fixed-width.has-border {
          max-width: 402px !important;
        }
        .fixed-width.has-border .layout__inner {
          box-sizing: border-box;
        }
        .snippet,
        .webversion {
          width: 50% !important;
        }
        .ie .btn {
          width: 100%;
        }
        [owa] .column div,
        [owa] .column button {
          display: block !important;
        }
        .ie .column,
        [owa] .column,
        .ie .gutter,
        [owa] .gutter {
          display: table-cell;
          float: none !important;
          vertical-align: top;
        }
        .ie div.preheader,
        [owa] div.preheader,
        .ie .email-footer,
        [owa] .email-footer {
          max-width: 560px !important;
          width: 560px !important;
        }
        .ie .snippet,
        [owa] .snippet,
        .ie .webversion,
        [owa] .webversion {
          width: 280px !important;
        }
        .ie div.header,
        [owa] div.header,
        .ie .layout,
        [owa] .layout,
        .ie .one-col .column,
        [owa] .one-col .column {
          max-width: 600px !important;
          width: 600px !important;
        }
        .ie .fixed-width.has-border,
        [owa] .fixed-width.has-border,
        .ie .has-gutter.has-border,
        [owa] .has-gutter.has-border {
          max-width: 602px !important;
          width: 602px !important;
        }
        .ie .two-col .column,
        [owa] .two-col .column {
          max-width: 300px !important;
          width: 300px !important;
        }
        .ie .three-col .column,
        [owa] .three-col .column,
        .ie .narrow,
        [owa] .narrow {
          max-width: 200px !important;
          width: 200px !important;
        }
        .ie .wide,
        [owa] .wide {
          width: 400px !important;
        }
        .ie .two-col.has-gutter .column,
        [owa] .two-col.x_has-gutter .column {
          max-width: 290px !important;
          width: 290px !important;
        }
        .ie .three-col.has-gutter .column,
        [owa] .three-col.x_has-gutter .column,
        .ie .has-gutter .narrow,
        [owa] .has-gutter .narrow {
          max-width: 188px !important;
          width: 188px !important;
        }
        .ie .has-gutter .wide,
        [owa] .has-gutter .wide {
          max-width: 394px !important;
          width: 394px !important;
        }
        .ie .two-col.has-gutter.has-border .column,
        [owa] .two-col.x_has-gutter.x_has-border .column {
          max-width: 292px !important;
          width: 292px !important;
        }
        .ie .three-col.has-gutter.has-border .column,
        [owa] .three-col.x_has-gutter.x_has-border .column,
        .ie .has-gutter.has-border .narrow,
        [owa] .has-gutter.x_has-border .narrow {
          max-width: 190px !important;
          width: 190px !important;
        }
        .ie .has-gutter.has-border .wide,
        [owa] .has-gutter.x_has-border .wide {
          max-width: 396px !important;
          width: 396px !important;
        }
        .ie .fixed-width .layout__inner {
          border-left: 0 none white !important;
          border-right: 0 none white !important;
        }
        .ie .layout__edges {
          display: none;
        }
        .mso .layout__edges {
          font-size: 0;
        }
        .layout-fixed-width,
        .mso .layout-full-width {
          background-color: #ffffff;
        }
        @media only screen and (min-width: 620px) {
          .column,
          .gutter {
            display: table-cell;
            Float: none !important;
            vertical-align: top;
          }
          div.preheader,
          .email-footer {
            max-width: 560px !important;
            width: 560px !important;
          }
          .snippet,
          .webversion {
            width: 280px !important;
          }
          div.header,
          .layout,
          .one-col .column {
            max-width: 600px !important;
            width: 600px !important;
          }
          .fixed-width.has-border,
          .fixed-width.ecxhas-border,
          .has-gutter.has-border,
          .has-gutter.ecxhas-border {
            max-width: 602px !important;
            width: 602px !important;
          }
          .two-col .column {
            max-width: 300px !important;
            width: 300px !important;
          }
          .three-col .column,
          .column.narrow {
            max-width: 200px !important;
            width: 200px !important;
          }
          .column.wide {
            width: 400px !important;
          }
          .two-col.has-gutter .column,
          .two-col.ecxhas-gutter .column {
            max-width: 290px !important;
            width: 290px !important;
          }
          .three-col.has-gutter .column,
          .three-col.ecxhas-gutter .column,
          .has-gutter .narrow {
            max-width: 188px !important;
            width: 188px !important;
          }
          .has-gutter .wide {
            max-width: 394px !important;
            width: 394px !important;
          }
          .two-col.has-gutter.has-border .column,
          .two-col.ecxhas-gutter.ecxhas-border .column {
            max-width: 292px !important;
            width: 292px !important;
          }
          .three-col.has-gutter.has-border .column,
          .three-col.ecxhas-gutter.ecxhas-border .column,
          .has-gutter.has-border .narrow,
          .has-gutter.ecxhas-border .narrow {
            max-width: 190px !important;
            width: 190px !important;
          }
          .has-gutter.has-border .wide,
          .has-gutter.ecxhas-border .wide {
            max-width: 396px !important;
            width: 396px !important;
          }
        }
        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
          .fblike {
            background-image: url(https://i7.createsend1.com/static/eb/master/13-the-blueprint-3/images/fblike@2x.png) !important;
          }
          .tweet {
            background-image: url(https://i8.createsend1.com/static/eb/master/13-the-blueprint-3/images/tweet@2x.png) !important;
          }
          .linkedinshare {
            background-image: url(https://i10.createsend1.com/static/eb/master/13-the-blueprint-3/images/lishare@2x.png) !important;
          }
          .forwardtoafriend {
            background-image: url(https://i9.createsend1.com/static/eb/master/13-the-blueprint-3/images/forward@2x.png) !important;
          }
        }
        @media (max-width: 321px) {
          .fixed-width.has-border .layout__inner {
            border-width: 1px 0 !important;
          }
          .layout,
          .column {
            min-width: 320px !important;
            width: 320px !important;
          }
          .border {
            display: none;
          }
        }
        .mso div {
          border: 0 none white !important;
        }
        .mso .w560 .divider {
          Margin-left: 260px !important;
          Margin-right: 260px !important;
        }
        .mso .w360 .divider {
          Margin-left: 160px !important;
          Margin-right: 160px !important;
        }
        .mso .w260 .divider {
          Margin-left: 110px !important;
          Margin-right: 110px !important;
        }
        .mso .w160 .divider {
          Margin-left: 60px !important;
          Margin-right: 60px !important;
        }
        .mso .w354 .divider {
          Margin-left: 157px !important;
          Margin-right: 157px !important;
        }
        .mso .w250 .divider {
          Margin-left: 105px !important;
          Margin-right: 105px !important;
        }
        .mso .w148 .divider {
          Margin-left: 54px !important;
          Margin-right: 54px !important;
        }
        .mso .size-8,
        .ie .size-8 {
          font-size: 8px !important;
          line-height: 14px !important;
        }
        .mso .size-9,
        .ie .size-9 {
          font-size: 9px !important;
          line-height: 16px !important;
        }
        .mso .size-10,
        .ie .size-10 {
          font-size: 10px !important;
          line-height: 18px !important;
        }
        .mso .size-11,
        .ie .size-11 {
          font-size: 11px !important;
          line-height: 19px !important;
        }
        .mso .size-12,
        .ie .size-12 {
          font-size: 12px !important;
          line-height: 19px !important;
        }
        .mso .size-13,
        .ie .size-13 {
          font-size: 13px !important;
          line-height: 21px !important;
        }
        .mso .size-14,
        .ie .size-14 {
          font-size: 14px !important;
          line-height: 21px !important;
        }
        .mso .size-15,
        .ie .size-15 {
          font-size: 15px !important;
          line-height: 23px !important;
        }
        .mso .size-16,
        .ie .size-16 {
          font-size: 16px !important;
          line-height: 24px !important;
        }
        .mso .size-17,
        .ie .size-17 {
          font-size: 17px !important;
          line-height: 26px !important;
        }
        .mso .size-18,
        .ie .size-18 {
          font-size: 18px !important;
          line-height: 26px !important;
        }
        .mso .size-20,
        .ie .size-20 {
          font-size: 20px !important;
          line-height: 28px !important;
        }
        .mso .size-22,
        .ie .size-22 {
          font-size: 22px !important;
          line-height: 31px !important;
        }
        .mso .size-24,
        .ie .size-24 {
          font-size: 24px !important;
          line-height: 32px !important;
        }
        .mso .size-26,
        .ie .size-26 {
          font-size: 26px !important;
          line-height: 34px !important;
        }
        .mso .size-28,
        .ie .size-28 {
          font-size: 28px !important;
          line-height: 36px !important;
        }
        .mso .size-30,
        .ie .size-30 {
          font-size: 30px !important;
          line-height: 38px !important;
        }
        .mso .size-32,
        .ie .size-32 {
          font-size: 32px !important;
          line-height: 40px !important;
        }
        .mso .size-34,
        .ie .size-34 {
          font-size: 34px !important;
          line-height: 43px !important;
        }
        .mso .size-36,
        .ie .size-36 {
          font-size: 36px !important;
          line-height: 43px !important;
        }
        .mso .size-40,
        .ie .size-40 {
          font-size: 40px !important;
          line-height: 47px !important;
        }
        .mso .size-44,
        .ie .size-44 {
          font-size: 44px !important;
          line-height: 50px !important;
        }
        .mso .size-48,
        .ie .size-48 {
          font-size: 48px !important;
          line-height: 54px !important;
        }
        .mso .size-56,
        .ie .size-56 {
          font-size: 56px !important;
          line-height: 60px !important;
        }
        .mso .size-64,
        .ie .size-64 {
          font-size: 64px !important;
          line-height: 63px !important;
        }
        </style>
            <style type="text/css" emb-inline>
        html {
          margin: 0;
          padding: 0;
        }
        body {
          margin: 0;
          padding: 0;
          -webkit-text-size-adjust: 100%;
        }
        table {
          border-collapse: collapse;
          table-layout: fixed;
        }
        .wrapper {
          min-width: 320px;
          width: 100%;
        }
        .wrapper + img {
          overflow: hidden;
          position: fixed;
        }
        .wrapper img {
          border: 0;
        }
        .wrapper a {
          text-decoration: underline;
          transition: opacity 0.1s ease-in;
        }
        .wrapper h1 a,
        .wrapper h2 a,
        .wrapper h3 a {
          text-decoration: none;
        }
        .wrapper h1,
        .wrapper h2,
        .wrapper h3,
        .wrapper p,
        .wrapper ol,
        .wrapper ul,
        .wrapper li,
        .wrapper blockquote {
          Margin-top: 0;
          Margin-bottom: 0;
        }
        .wrapper blockquote {
          Margin-left: 0;
          Margin-right: 0;
          padding-left: 14px;
        }
        .wrapper h1,
        .wrapper h2,
        .wrapper h3 {
          font-style: normal;
          font-weight: normal;
        }
        .wrapper h1 + *,
        .wrapper h1 + * > li:first-child,
        .wrapper h1 + blockquote :first-child {
          Margin-top: 20px;
        }
        .wrapper h2 + *,
        .wrapper h2 + * > li:first-child,
        .wrapper h2 + blockquote :first-child {
          Margin-top: 16px;
        }
        .wrapper h3 + *,
        .wrapper h3 + * > li:first-child,
        .wrapper h3 + blockquote :first-child {
          Margin-top: 12px;
        }
        .wrapper ol,
        .wrapper ul {
          Margin-left: 24px;
          padding: 0;
        }
        .wrapper ul {
          list-style-type: disc;
        }
        .wrapper ol {
          list-style-type: decimal;
        }
        .wrapper li {
          Margin-left: 0;
        }
        .wrapper p + *,
        .wrapper ol + *,
        .wrapper ul + *,
        .wrapper blockquote + *,
        .wrapper .image--inline + *,
        .wrapper .video + *,
        .wrapper .divider + *,
        .wrapper .btn + *,
        .wrapper p + * > li:first-child,
        .wrapper ol + * > li:first-child,
        .wrapper ul + * > li:first-child,
        .wrapper blockquote + * > li:first-child,
        .wrapper .image--inline + * > li:first-child,
        .wrapper .video + * > li:first-child,
        .wrapper .divider + * > li:first-child,
        .wrapper .btn + * > li:first-child,
        .wrapper p + blockquote :first-child,
        .wrapper ol + blockquote :first-child,
        .wrapper ul + blockquote :first-child,
        .wrapper blockquote + blockquote :first-child,
        .wrapper .image--inline + blockquote :first-child,
        .wrapper .video + blockquote :first-child,
        .wrapper .divider + blockquote :first-child,
        .wrapper .btn + blockquote :first-child {
          Margin-top: 20px;
        }
        .text--inline {
          mso-line-height-rule: exactly;
          mso-text-raise: 4px;
        }
        .column__padding--inline:nth-last-child(n+2) h1:last-child {
          Margin-bottom: 20px;
        }
        .column__padding--inline:nth-last-child(n+2) h2:last-child {
          Margin-bottom: 16px;
        }
        .column__padding--inline:nth-last-child(n+2) h3:last-child {
          Margin-bottom: 12px;
        }
        .column__padding--inline:nth-last-child(n+2) p:last-child,
        .column__padding--inline:nth-last-child(n+2) ol:last-child,
        .column__padding--inline:nth-last-child(n+2) ul:last-child,
        .column__padding--inline:nth-last-child(n+2) blockquote:last-child,
        .column__padding--inline:nth-last-child(n+2) .image--inline,
        .column__padding--inline:nth-last-child(n+2) .video,
        .column__padding--inline:nth-last-child(n+2) .divider,
        .column__padding--inline:nth-last-child(n+2) .btn {
          Margin-bottom: 20px;
        }
        .image--inline,
        .video {
          font-size: 12px;
          font-style: normal;
          font-weight: normal;
          line-height: 19px;
        }
        .image--inline img,
        .video img {
          display: block;
          height: auto;
          width: 100%;
        }
        .btn a {
          border-radius: 3px;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          line-height: 24px;
          padding: 12px 24px;
          text-align: center;
          text-decoration: none !important;
        }
        .btn--medium a {
          font-size: 12px;
          line-height: 22px;
          padding: 10px 20px;
        }
        .btn--small a {
          font-size: 11px;
          line-height: 19px;
          padding: 6px 12px;
        }
        .btn--shadow a {
          box-shadow: inset 0 -2px 0 0 rgba(0, 0, 0, 0.2);
          padding: 12px 24px 13px 24px;
        }
        .btn--medium.btn--shadow a {
          padding: 10px 20px 11px 20px;
        }
        .btn--small.btn--shadow a {
          padding: 6px 12px 7px 12px;
        }
        .btn--depth a {
          border: 1px solid rgba(0, 0, 0, 0.25);
          box-shadow: inset 0 -3px 0 -1px rgba(0, 0, 0, 0.2), inset 0 2px 1px -1px #ffffff;
          text-shadow: 0 1px 0 rgba(0, 0, 0, 0.21);
        }
        .divider {
          display: block;
          font-size: 2px;
          line-height: 2px;
          Margin-left: auto;
          Margin-right: auto;
          width: 40px;
        }
        .border {
          font-size: 0;
        }
        div.preheader {
          Margin: 0 auto;
          max-width: 560px;
          min-width: 280px;
          -fallback-width: 280px;
          width: calc(28000% - 167440px);
        }
        .header,
        .email-footer {
          Margin: 0 auto;
          max-width: 600px;
          min-width: 320px;
          -fallback-width: 320px;
          width: calc(28000% - 167400px);
        }
        .logo {
          font-size: 26px;
          line-height: 32px;
          Margin-top: 10px;
          Margin-bottom: 20px;
        }
        .header--padded--inline .logo {
          Margin-left: 20px;
          Margin-right: 20px;
        }
        .wrapper .logo a {
          text-decoration: none;
        }
        .logo img {
          display: block;
          height: auto;
          width: 100%;
        }
        .snippet {
          display: table-cell;
          Float: left;
          font-size: 12px;
          line-height: 19px;
          max-width: 280px;
          min-width: 140px;
          -fallback-width: 140px;
          width: calc(14000% - 78120px);
          padding: 10px 0 5px 0;
        }
        .webversion {
          display: table-cell;
          Float: left;
          font-size: 12px;
          line-height: 19px;
          max-width: 280px;
          min-width: 139px;
          -fallback-width: 139px;
          width: calc(14100% - 78680px);
          padding: 10px 0 5px 0;
        }
        .webversion {
          text-align: right;
        }
        .layout {
          Margin: 0 auto;
          max-width: 600px;
          min-width: 320px;
          -fallback-width: 320px;
          width: calc(28000% - 167400px);
          overflow-wrap: break-word;
          word-wrap: break-word;
          word-break: break-word;
        }
        .preheader__inner--inline,
        .layout__inner {
          border-collapse: collapse;
          display: table;
          width: 100%;
        }
        .fixed-width .layout__inner,
        .full-width--inline,
        .has-gutter .column__background {
          background-color: #ffffff;
        }
        .fixed-width.has-border,
        .has-gutter.has-border {
          max-width: 602px;
          min-width: 322px;
          -fallback-width: 322px;
          width: calc(28000% - 167398px);
        }
        .column__padding--inline {
          Margin-left: 20px;
          Margin-right: 20px;
        }
        .one-col .column {
          max-width: 600px;
          min-width: 320px;
          -fallback-width: 320px;
          width: calc(28000% - 167400px);
        }
        .two-col .column {
          Float: left;
          max-width: 320px;
          min-width: 300px;
          -fallback-width: 320px;
          width: calc(12300px - 2000%);
        }
        .three-col .column,
        .sidebar--inline .column.narrow {
          Float: left;
          max-width: 320px;
          min-width: 200px;
          -fallback-width: 320px;
          width: calc(72200px - 12000%);
        }
        .sidebar--inline .column.wide {
          Float: left;
          max-width: 400px;
          min-width: 320px;
          -fallback-width: 320px;
          width: calc(8000% - 47600px);
        }
        .two-col.has-gutter .column {
          max-width: 320px;
          min-width: 290px;
          -fallback-width: 320px;
          width: calc(18290px - 3000%);
        }
        .two-col.has-gutter.has-border .column {
          max-width: 322px;
          min-width: 292px;
          -fallback-width: 322px;
          width: calc(18292px - 3000%);
        }
        .three-col.has-gutter .column,
        .sidebar--inline.has-gutter .column.narrow {
          max-width: 320px;
          min-width: 188px;
          -fallback-width: 320px;
          width: calc(79388px - 13200%);
        }
        .three-col.has-gutter.has-border .column,
        .sidebar--inline.has-gutter.has-border .column.narrow {
          max-width: 322px;
          min-width: 190px;
          -fallback-width: 322px;
          width: calc(79390px - 13200%);
        }
        .sidebar--inline.has-gutter .column.wide {
          max-width: 394px;
          min-width: 320px;
          -fallback-width: 320px;
          width: calc(7400% - 44006px);
        }
        .sidebar--inline.has-gutter.has-border .column.wide {
          max-width: 396px;
          min-width: 322px;
          -fallback-width: 322px;
          width: calc(7400% - 44004px);
        }
        .gutter {
          Float: left;
        }
        .two-col .gutter {
          width: 20px;
        }
        .two-col.has-border .gutter {
          width: 18px;
        }
        .three-col .gutter,
        .sidebar--inline .gutter {
          width: 18px;
        }
        .three-col.has-border .gutter,
        .sidebar--inline.has-border .gutter {
          width: 16px;
        }
        .fixed-width .column,
        .full-width--inline .column,
        .column__background__inner--inline,
        .email-footer .column {
          text-align: left;
        }
        .fixed-width.has-border .layout__inner {
          max-width: 601px;
        }
        .fixed-width.has-border + .fixed-width.has-border .layout__inner,
        .full-width--inline.has-border + .full-width--inline.has-border {
          border-top: 0 none white;
        }
        .full-padding .layout--inherit-padding--inline .column__padding--inline:first-child,
        .layout.layout--full-padding--inline .column__padding--inline:first-child {
          Margin-top: 24px;
        }
        .full-padding .layout--inherit-padding--inline .column__padding--inline:last-child,
        .layout.layout--full-padding--inline .column__padding--inline:last-child {
          Margin-bottom: 24px;
        }
        .half-padding .layout--inherit-padding--inline .column__padding--inline:first-child,
        .layout--half-padding--inline .column__padding--inline:first-child {
          Margin-top: 12px;
        }
        .half-padding .layout--inherit-padding--inline .column__padding--inline:last-child,
        .layout--half-padding--inline .column__padding--inline:last-child {
          Margin-bottom: 12px;
        }
        .footer__share-button__container--inline {
          Margin-bottom: 6px;
          mso-line-height-rule: exactly;
        }
        .footer__share-button__container--inline span {
          font-size: 11px;
        }
        .footer__share-button__container--inline img {
          display: inline-block;
          margin-right: 2px;
          vertical-align: -3px;
        }
        .email-footer .footer__share-button__link--inline {
          border-radius: 2px;
          color: #ffffff;
          display: inline-block;
          font-size: 11px;
          font-weight: bold;
          line-height: 19px;
          text-align: left;
          text-decoration: none;
          border-style: solid;
          border-width: 4px 7px 3px 4px;
          mso-border-width-alt: 4px 8px 8px 8px;
        }
        .email-footer .column {
          font-size: 12px;
          line-height: 19px;
        }
        .email-footer .column__padding--inline {
          Margin-top: 10px;
          Margin-bottom: 10px;
        }
        .email-footer__links + * {
          Margin-top: 20px;
        }
        .email-footer__links td {
          padding: 0;
        }
        .email-footer__links td + td {
          padding: 0 0 0 3px;
        }
        .email-footer__address--inline + * {
          Margin-top: 18px;
        }
        .email-footer__address--inline,
        .email-footer__permission--inline,
        .email-footer__subscription--inline {
          font-size: 12px;
          line-height: 19px;
        }
        [role=section] > div:not(.layout):not(.full-width--inline),
        .column > div > div[style*="font-size:1px"] {
          mso-line-height-rule: exactly;
        }
        </style>
          <!--[if !mso]><!--><style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400);
        </style><link href="https://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400" rel="stylesheet" type="text/css"><!--<![endif]--><style type="text/css" emb-inline>
        .wrapper{background-color:#f5f7fa}.wrapper h1{color:#44a8c7}.wrapper h1{font-size:32px;line-height:40px}.wrapper h1{}.wrapper h1{font-family:Cabin,Avenir,sans-serif}.wrapper h2{color:#44a8c7}.wrapper h2{font-size:20px;line-height:28px}.wrapper h3{color:#44a8c7}.wrapper h3{font-size:17px;line-height:26px}.wrapper a{color:#5c91ad}.fixed-width .column,.full-width--inline .column,.column__background__inner--inline{color:#60666d}.fixed-width .column,.full-width--inline .column,.column__background__inner--inline{font-size:14px;line-height:21px}.fixed-width .column,.full-width--inline .column,.column__background__inner--inline{font-family:Open Sans,sans-serif}.fixed-width.has-border .layout__inner{border-top:1px solid #b1c1d8;border-right:1px solid #b1c1d8;border-bottom:1px solid #b1c1d8;border-left:1px solid #b1c1d8}.full-width--inline.has-border,.has-gutter.has-border .column__background{border-top:1px solid #b1c1d8;border-bottom:1px solid #b1c1d8}.border{background-color:#b1c1d8}.wrapper blockquote{border-left:4px solid #b1c1d8}.divider{background-color:#b1c1d8}.wrapper .btn a{color:#fff}.wrapper .btn a{font-family:Open Sans,sans-serif}.btn--flat a,.btn--shadow a,.btn--depth a{background-color:#5c91ad}.btn--ghost a{border:1px solid #5c91ad}.snippet,.webversion,.email-footer .column{color:#b9b9b9}.snippet,.webversion,.email-footer .column{font-family:Open Sans,sans-serif}.wrapper .preheader a,.wrapper .footer__left a{color:#b9b9b9}.logo{color:#c3ced9}.logo{font-family:Roboto,Tahoma,sans-serif}.wrapper .logo a{color:#c3ced9}.email-footer a{color:#b9b9b9}.email-footer a:hover{color:#b9b9b9 !important}.email-footer .footer__share-button__link--inline{background-color:#7b7c7d;border-color:#7b7c7d;mso-border-color-alt:#7b7c7d}
        </style><style type="text/css" emb-not-inline>
        body{background-color:#f5f7fa}.logo a:hover,.logo a:focus{color:#859bb1 !important}.mso .layout-has-border{border-top:1px solid #b1c1d8;border-bottom:1px solid #b1c1d8}.mso .layout-has-bottom-border{border-bottom:1px solid #b1c1d8}.mso .border,.ie .border{background-color:#b1c1d8}.mso h1,.ie h1{}.mso h1,.ie h1{font-size:40px !important;line-height:47px !important}.mso h2,.ie h2{}.mso h2,.ie h2{font-size:24px !important;line-height:32px !important}.mso h3,.ie h3{}.mso h3,.ie h3{font-size:20px !important;line-height:28px !important}.mso .layout__inner,.ie .layout__inner{}.mso .footer__share-button p{}.mso .footer__share-button p{font-family:Open Sans,sans-serif}
        </style></head>
        <!--[if mso]>
          <body class="mso">
        <![endif]-->
        <!--[if !mso]><!-->
          <body class="full-padding full-padding">
        <!--<![endif]-->
            <table class="wrapper" cellpadding="0" cellspacing="0" role="presentation"><tr><td>
              <div role="banner">
                <div class="preheader">
                  <div class="preheader__inner--inline">
                  <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 280px" valign="top"><![endif]-->
                    <div class="snippet">
                      
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]-->
                    <div class="webversion">
                      
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="header header--padded--inline" id="emb-email-header-container">
                <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 600px"><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
              </div>
              <div role="section">
        
              <div class="layout one-col fixed-width layout--inherit-padding--inline">
                <div class="layout__inner" emb-background-style>
                <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]-->
                  <div class="column">
                
                    <div class="column__padding--inline">
              <div style="line-height:10px;font-size:1px">&nbsp;</div>
            </div>
                
                    <div class="column__padding--inline">
              <div class="text--inline">
                <h2 style="text-align: center;">
                <span style="color:#404074"><strong>Editor de Imagenes</strong></span>
                </h2>
                
                <p class="size-16" style="font-size: 16px; line-height: 24px; text-align: center;" lang="x-size-16">
                    A continuaci&#243;n podras ver tu imagen en el siguiente enlace:
                <br><br>'.$ruta.'<br><br>O si lo prefieres descargar en formato PDF</p>
              </div>
            </div>
                
                  </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                </div>
              </div>
          
              
              <div role="contentinfo">
                <div class="layout sidebar--inline email-footer">
                  <div class="layout__inner">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]-->
                    <div class="column wide">
                      <div class="column__padding--inline">
                        
                        <!--[if mso]>&nbsp;<![endif]-->
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]-->
                    <div class="column narrow">
                      <div class="column__padding--inline">
                        
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
                <div class="layout one-col email-footer">
                  <div class="layout__inner">
                  <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]-->
                    <div class="column">
                      <div class="column__padding--inline">
                        <div class="email-footer__subscription--inline">

                        </div>
                      </div>
                    </div>
                  <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                  </div>
                </div>
              </div>
              <div style="line-height:40px;font-size:40px;">&nbsp;</div>
            </div></td></tr></table>
          <script type="text/javascript" src="https://js.createsend1.com/js/jquery-1.7.2.min.js?h=C99A4659201711270307"></script><script type="text/javascript">$(function(){$("area,a").attr("target", "_blank");});</script></body>
        </html>

    ' ;


        $mail = new PHPMailer();

        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";
        $mail->Port       = 465;
        $mail->Username   = "noreply@gmail.com";
        $mail->Password   = "";

        $mail->setFrom('aurelien.antonio@gmail.com', 'Editor de Imagenes');
        $mail -> isHTML(true);
        $mail -> Subject = utf8_decode("Nueva imagen editada desde el sitio web");
        $mail->addAddress($this->email);
        //$mail->addAddress('munozmarinandresfelipe@gmail.com');
        //$mail->addAddress('jass.cruz@gmail.com');
        $mail -> MsgHTML($body);
        $mail->addStringAttachment($archivo, ''.$nombre.'.pdf', 'base64', 'application/pdf');
    
        if(!$mail->send()){

            echo json_encode(array('code' => '0'));

        }else{

            echo json_encode(array('code' => '1'));

        }



    }
 
}
   

?>