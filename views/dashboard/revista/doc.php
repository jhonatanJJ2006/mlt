<main class="dashboard__color">

    <?php


 include_once __DIR__ . '/../header-paginas.php'; ?>

    <h2 class="dashboard__h2"><?php echo $titulo ?></h2>

    <div style="display: flex; justify-content: center;" class="dashboard__color">

        <embed src="<?php  echo '/build/revistas/pdf/' . $revista->pdf . '.pdf' ?>" type="application/pdf" width="90%" height="1000" />
        
    </div>

    
</main>