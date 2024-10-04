<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combos Dependientes de Distrito y Zona</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Combos Dependientes de Distrito y Zona AJAX</h3>
                    </div>
                    <div class="card-body">
                        <form id="registro-form">
                            <div class="form-group mb-3">
                                <label for="distrito" class="form-label">Distrito</label>
                                <select id="distrito" name="distrito" class="form-control">
                                    <option value="">Seleccione un distrito</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="zona" class="form-label">Zona</label>
                                <select id="zona" name="zona" class="form-control" disabled>
                                    <option value="">Seleccione una zona</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                        </form>
                        <div id="alerta-validacion" class="alert alert-danger mt-3" role="alert" style="display: none;">
                            Por favor, seleccione tanto un distrito como una zona.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'saca_distritos.php',
                type: 'GET',
                success: function(data) {
                    $('#distrito').append(data);
                }
            });

            $('#distrito').change(function() {
                var distrito = $(this).val();
                $('#zona').prop('disabled', !distrito); 
                $('#zona').html('<option value="">Seleccione una zona</option>'); 

                if (distrito) {
                    $.ajax({
                        url: 'saca_zonas.php',
                        type: 'GET',
                        data: { distrito: distrito },
                        success: function(data) {
                            $('#zona').append(data);
                        }
                    });
                }
            });

            $('#registro-form').submit(function(e) {
                e.preventDefault(); 
                
                var distrito = $('#distrito').val();
                var zona = $('#zona').val();
                if (distrito && zona) {
                    window.location.href = 'MuestraCatastros.php?distrito=' + encodeURIComponent(distrito) + '&zona=' + encodeURIComponent(zona);
                } else {
                    $('#alerta-validacion').show();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
