<html>
<meta charset="UTF-8">
<head>
    <title>InterAut</title>
    <script src="jquery-3.7.1.min.js"></script>
</head>

<style>
body {
    background-image: url(white.png);
    background-size: auto;

}

* {
    font-style:arial; 
    text-align: center;
    color: #f3e3e3;
 
}

.H {
    font-size: 35px;
    color:rgb(5, 5, 5);
    padding: 0%;
    margin: 0;
    
}
p {
    color: #141414;
    text-align: justify;
}

#div1{
    padding: 20px;
    font-size: 25px;
    margin: auto;
    width: 40%;
    height: 10%;
    background-image: url(InterAutsf.png);
    margin-top: 18%;
    border-radius: 50px;
    display: flexbox;
    font-weight: bold;
    color: black;
    }    
    
#btn{
    color: #ffffff;
    background-color: rgb(25, 38, 107);
    font-size: 32px;
}

footer {
    background-color: #141414;
    color: #f9fcf8;
    padding: 2%;
    text-align: center;
    font-size: 23px;
    margin-top: 400px;
}

</style>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interaut";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$stmt = $conn->prepare("INSERT INTO pessoa (nome, tel, email, genero, CPF, senha, tipoTratamento, login, tipoPessoa, dataNasc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1, ?)");

if (!$stmt) {
    die("Preparation failed: " . $conn->error);
}

$stmt->bind_param("sssisssss", $nome, $tel, $email, $genero, $cpf, $senha, $tratamento, $email, $dtNasc);

$nome = $_POST["pessoaNome"];
$tel = $_POST["pessoaTel"];
$email = $_POST["pessoaEmail"];
$genero = $_POST["genero"];
$cpf = $_POST["pessoaCPF"];
$senha = $_POST["pessoaSenha"];
$tratamento = $_POST["tipoTratamento"];
$dtNasc = $_POST["dataNasc"];

$stmt->execute();

$stmt->close();
$conn->close();
?>

<body>

<main>

    <div id="div1">
    <p>
        Parabens, seu cadastro foi realizado com sucesso, 
        vá a uma unidade que fornece nossos serviços para proseguir para as proximas etapas.
    </p>
    </div>
    <br><br>

    <a href="home.html"><button id="btn" style="color: #ffffff;
    background-color: rgb(25, 38, 107);
    font-size: 32px;">Voltar</button></a>
    
</main>



</body>

<footer>
    &copy; 2023 InterAut Corporation.

</footer>

</html>