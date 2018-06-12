<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
</head>
<body>
<form method="get" action="http://localhost:8000">
    <select name="estado" id="estado">
        <option value="1">Minas Gerais</option>
        <option value="2">São Paulo</option>
    </select>

    <select name="cidade" id="cidade">
        <option value="" disabled>Selecione a cidade</option>
    </select>
    <button type="submit">Enviar</button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#estado').select2({
            ajax: {
                url: 'http://localhost:8000/estados',
                data: function (params) {
                    return {
                        estado: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (estado) {
                            return {id: estado.id, text: estado.sigla + ' - ' + estado.estado};
                        })
                    }
                }
            },
        })

        $('#cidade').select2({
            ajax: {
                url: 'http://localhost:8000/cidades',
                data: function (params) {
                    return {
                        estado: $('#estado').val(),
                        cidade: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (cidade) {
                            return {id: cidade.id, text: cidade.cidade};
                        })
                    }
                }
            },
        })
    });
</script>
</body>
</html>