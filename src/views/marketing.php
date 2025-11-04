<style>
    .consecutivo {
        font-size: 1rem !important;
        color: rgba(204, 51, 51, 1) !important;
        font-weight: bold !important;
        text-align: center !important;
    }
    .contratos-modal{
        background-color: rgba(0, 0, 0, 0.75);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: auto;
    }
    .btn-x{
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 40px;
        cursor: pointer;
        color: white;
    }
    .box-contratos-modal{
        width: 80%;
        height: 80%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<?php include __DIR__ . '/sectionUser.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mt50"></div>
            <table id="tablaUsuarios" class="table table-striped">
                <thead>
                    <tr>
                        <th class=""></th>
                        <th>Email</th>
                        
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //$sql = "SELECT * FROM usuarios ORDER BY id DESC";
                        $sql = "SELECT * FROM usuarios inner join datos_usuarios ON usuarios.id = datos_usuarios.id_usuario order by usuarios.id desc";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                    ?>
                    <tr>
                        <td class="consecutivo"><?php echo htmlspecialchars($row['id']+100); ?></td>
                        <td>
                            <?php echo htmlspecialchars($row['email']); ?>
                            <?php if ($row['verificado']): ?>
                                <i class="bi bi-patch-check blue"></i>
                                <div class="gray f12"><?php echo $row['nombres']; ?></div>
                            <?php else: ?>
                                <span class="badge bg-danger">Sin verificar</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($row['verificado']): ?>
                            <div class="form-check form-switch ml6 f22 f-left">
                                <input class="form-check-input" type="checkbox" onchange=aprobar(<?php echo htmlspecialchars($row['id']); ?>) value="" id="check-<?php echo htmlspecialchars($row['id']); ?>" switch <?php if ($row['aprobado']): ?>checked<?php endif; ?> <?php if ($row['estado_user']=='firmado'): ?>disabled<?php endif; ?>>
                            </div>
                            <?php endif; ?>
                            <?php if ($row['aprobado']){
                                $class = "";
                            } else {
                                $class = "oculto";
                            } ?>
                            <div class="<?php echo $class; ?> botones-<?php echo htmlspecialchars($row['id']); ?>">
                                <a id="btn-contrato-<?php echo htmlspecialchars($row['id']); ?>" onclick=openContrato(<?php echo htmlspecialchars($row['id']); ?>) class="btn <?php if ($row['estado_user']=='firmado'): ?>btn-primary<?php else: ?>btn-warning<?php endif; ?>"><i class="bi bi-card-checklist"></i></a>
                                <!--<a id="btn-whatsapp-<?php echo htmlspecialchars($row['id']); ?>" href="" class="btn btn-success white"><i class="bi bi-whatsapp"></i></a>-->
                            </div>
                        </td>
                    </tr>
                    <?php
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<section>      <!-- Seccion para Modales -->
            <!-- Full screen modal -->

            <div class="contratos-modal">
                nada
            </div>

        </section>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script src="<?php echo BASE_URL; ?>src/js/marketing.js"></script>