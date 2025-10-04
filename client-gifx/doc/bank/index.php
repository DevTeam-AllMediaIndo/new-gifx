<?php
    $query = $db->prepare('SELECT * FROM tb_banklist ORDER BY BANKLST_NAME');
    $query->execute();
    $result = $query->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="row">
    <div class="card">
        <div class="card-header justify-content-between">
            Daftar Bank
        </div>
    </div>

    <?php require_once __DIR__ . "/create.php"; ?>

    <!-- tabel -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="tabel">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal Dibuat</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Status</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let table;
    $(document).ready(function(){
        table = $('#tabel').DataTable({
            processing: true,
            serverSide: true,
            deferRender: true,
            scrollx: true,
            order: [[0, 'desc']],
            ajax: {
                url: "/ajax/datatable/bank",
                contentType: "application/json",
                type: "GET",
            },
            lengthMenu: [
                [10, 50, 100, -1],
                [10, 50, 100, "All"]
            ]
        })
    })
</script>