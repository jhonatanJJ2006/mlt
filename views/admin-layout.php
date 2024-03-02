<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevWebCamp - <?php echo $titulo; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Namdhinggo:wght@400;500;600;700;800&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="admin">
        <?php 
            include_once __DIR__ .'/templates/admin-header.php';
        ?>
        <div class="admin__grid">
            <?php
                include_once __DIR__ .'/templates/admin-sidebar.php';  
            ?>

            <main class="admin__contenido">
                <?php 
                    echo $contenido; 
                ?> 
            </main>
        </div>

    <script src="/build/js/bundle.min.js" defer></script>
    <script src="https://acrobatservices.adobe.com/view-sdk/viewer.js"></script>
    <script type="text/javascript">
        document.addEventListener("adobe_dc_view_sdk.ready", function(){ 
            var adobeDCView = new AdobeDC.View({clientId: "2jhonatanjara2@gmail.com", divId: "adobe-dc-view"});
            adobeDCView.previewFile({
                content:{location: {url: "/build/revistas/pdf/030e49eb50c886b6366eb94b6447208b.pdf"}},
                metaData:{fileName: "Bodea Brochure.pdf"}
            }, {embedMode: "SIZED_CONTAINER"});
        });
    </script>
</body>
</html>