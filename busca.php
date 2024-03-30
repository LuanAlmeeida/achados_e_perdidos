<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="./fontawesome-free-6.0.0-beta2-web/fontawesome-free-6.0.0-beta2-web/css/all.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="img/Logo CCHLA transparente texto preto.svg" alt="Logo" class="logo ml-3" width="60"></a>
                <a class="navbar-brand" href="index.html">Achados e Perdidos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link active" href="index.html"><i class="fas fa-home"></i> Página Inicial <span
                                    class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link" href="cadastrar.html"><i class="fas fa-plus-circle"></i> Cadastrar</a>
                            <a class="nav-item nav-link" href="listar.php"><i class="fas fa-list-ul"></i> Listar</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="text-center">
            <h1>Pesquisa</h1>
        </div>
        
        <?php
            if(empty($_GET['busca'])) {
                echo '<script type="text/javascript">
                        alert("Digite o termo desejado para realizar a busca");
                        window.location.href = "index.html";
                      </script>';
            } else {
                $busca = $_GET['busca'];
                $con = new mysqli("localhost", "root", "", "achados_e_perdidos");

                $sql = "SELECT * FROM achados WHERE titulo LIKE '%$busca%'";
                $result = $con->query($sql);

                $achados = false;
                if($result->num_rows > 0) {
                    echo "<h2 class='text-center'>Resultados Achados</h2>";
                    $achados = true;
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="text-center"><img src="img/'.$row['foto'].'" style="width:200px" /></div>';
                        echo '<div class="text-center"><strong>Objeto:</strong><p>' . $row['titulo'] . '</p></div>';
                        echo '<div class="text-center"><strong>Descrição:</strong><p>' . $row['descricao'] . '</p></div>';
                        echo '<div class="text-center"><strong>Local:</strong><p>' . $row['local'] . '</p></div>';
                        echo '<div class="text-center"><strong>Quem Achou:</strong><p>' . $row['quem'] . '</p></div>';
                        $data = $row['data'];
                        $dia = date('d', strtotime($data));
                        $mes = date('m', strtotime($data));
                        $ano = date('Y', strtotime($data));
                        echo '<div class="text-center"><strong>Data:</strong><p>' . $dia . '/' . $mes . '/' . $ano . '</p></div><br>';

                    }
                }

                $sql = "SELECT * FROM perdidos WHERE titulo LIKE '%$busca%'";
                $result = $con->query($sql);

                if($result->num_rows > 0) {
                    echo "<h2 class='text-center'>Resultados Perdidos</h2>";
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="text-center"><img src="img/'.$row['foto'].'" style="width:200px" /></div>';
                        echo '<div class="text-center"><strong>Objeto:</strong><p>' . $row['titulo'] . '</p></div>';
                        echo '<div class="text-center"><strong>Descrição:</strong><p>' . $row['descricao'] . '</p></div>';
                        echo '<div class="text-center"><strong>Local:</strong><p>' . $row['local'] . '</p></div>';
                        echo '<div class="text-center"><strong>Quem Perdeu:</strong><p>' . $row['quem'] . '</p></div>';
                        $data = $row['data'];
                        $dia = date('d', strtotime($data));
                        $mes = date('m', strtotime($data));
                        $ano = date('Y', strtotime($data));
                        echo '<div class="text-center"><strong>Data:</strong><p>' . $dia . '/' . $mes . '/' . $ano . '</p></div><br>';

                    }
                }

                if(!$achados) {
                    echo '<div style="font-size: 100px; text-align: center;"><i class="fas fa-ban"></i></div>';
                    echo "<h3 class='text-center'>Nenhum resultado encontrado</h3>";
                }
            }



        ?>

    <div class="container">
                <div class="text-center mt-5">
                    <h3>Localização do CCHLA</h3>
                    <iframe title="Mapa de Localização do CCHLA"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.112149763295!2d-35.19994623523283!3d-5.839813345768657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2ffe026418e1d%3A0x92519e8aac58661b!2sCCHLA%2FUFRN%20-%20Centro%20de%20Ci%C3%AAncias%20Humanas%2C%20Letras%20e%20Artes!5e0!3m2!1spt-BR!2sbr!4v1663724166311!5m2!1spt-BR!2sbr"
                        width="100%" height="300" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="d-flex justify-content-between">
                    <p style="text-align: left">
                        <span class="d-flex align-items-center">
                            <span><i class="fas fa-map-marker-alt"></i> Av. Senador Salgado Filho, nº 3000 - CEP 59078-970, Lagoa Nova, </span>
                        </span>
                        <span class="d-flex align-items-center">
                            <span>Universidade Federal do Rio Grande do Norte - UFRN, </span>
                        </span>
                        <span class="d-flex align-items-center">
                            <span>Campus Unisersitário Central, </span>
                        </span>
                        <span class="d-flex align-items-center">
                            <span>Centro de Ciências Humanas, Letras e Artes, </span>
                        </span>
                        <span class="d-flex align-items-center">
                            <span>Natal - Rio Grande do Norte - Brasil.</span>
                        </span>
                    </p>
                    <p style="text-align: right">
                        <span class="d-flex align-items-center">
                            <span><i class="fas fa-phone-alt"></i> +55 (84) 3342-2243 / <a style="color: inherit; text-decoration: none" href="https://wa.me/5584991936154?text=Olá%2C%20gostaria%20de%20fazer%20uma%20pergunta%20ou%20atividade%20no%20CCHLA." onmouseover="this.style.color='rgba(0, 0, 0, 0.6)'" onmouseout="this.style.color='inherit'"> +55 (84) 99193-6154 <i class="fab fa-whatsapp"></i></a></span>
                        </span>
                        <span class="d-flex align-items-center">
                            <a style="color:inherit; text-decoration: none" href="mailto:secretariacchla@gmail.com?subject=Contato%20por%20meio%20do%20site%20do%20CCHLA"
                            onmouseover="this.style.color='rgba(0, 0, 0, 0.6)'" onmouseout="this.style.color='inherit'"><span><i class="fas fa-envelope"></i> secretariacchla@gmail.com</span></a>
                        </span>
                    </p>
                </div>
                <div style="position: fixed; bottom: 50px; right: 50px; z-index: 999; display: none;" id="voltar-ao-topo">
                <a href="#" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background-color: #007bff; border-radius: 50%; color: white; text-decoration: none; font-size: 24px;">
                    <i class="fas fa-arrow-up"></i>
                </a>
            </div>
            <script>
                const botaoVoltarAoTopo = document.querySelector("#voltar-ao-topo");

                window.addEventListener("scroll", function () {
                    if (window.scrollY + window.innerHeight >= document.body.scrollHeight) {
                        botaoVoltarAoTopo.style.display = "block";
                    } else {
                        botaoVoltarAoTopo.style.display = "none";
                    }
                });

                botaoVoltarAoTopo.addEventListener("click", function (event) {
                    event.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                });
            </script>
    </div>    
    <footer class="footer mt-auto py-3">
        <div class="container d-flex align-items-center justify-content-center">
            <img src="img/assinatura-secundaria1.svg" alt="Logo do Centro de Ciências" width="330">
            <span class="text-muted mx-3 d-flex align-items-center justify-content-center" style="width: 100%; text-align: center;">&copy; 2024 . Centro de Ciências Humanas, Letras e Artes . Todos os direitos reservados</span>
            <img src="img/Logo_CCHLA_50_Anos_Colorido.svg" alt="Logo do Hula" width="230">
        </div>
    </footer>
</body>

</html>
