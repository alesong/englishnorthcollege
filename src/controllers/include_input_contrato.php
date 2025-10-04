<!-- El id viene del archivo contrato.php -->
<div>
    <label id="label-<?php echo $id; ?>" class="f10 pl5" for="<?php echo $id; ?>"><?php echo $label; ?><i id="icon-<?php echo $id; ?>" class="bi bi-check ml5 oculto"></i></label>
</div>
<input type="<?php echo $type; ?>" class="col100 b0 pl5" id="<?php echo $id; ?>" name="<?php echo $id; ?>" onchange="update('<?php echo $id; ?>')" value="<?php echo $row[$id]; ?>">