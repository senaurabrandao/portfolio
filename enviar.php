<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Pega os dados do formulário
  $nome = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $assunto = htmlspecialchars($_POST['subject']);
  $mensagem = htmlspecialchars($_POST['message']);

  // Email que vai receber a mensagem
  $destino = "carloslcr@hotmail.com"; // 👉 Substitua pelo seu e-mail real

  // Monta o corpo do e-mail
  $conteudo = "Nome: $nome\n";
  $conteudo .= "Email: $email\n";
  $conteudo .= "Assunto: $assunto\n\n";
  $conteudo .= "Mensagem:\n$mensagem\n";

  // Cabeçalhos
  $headers = "From: $nome <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Envia o e-mail
  if (mail($destino, $assunto, $conteudo, $headers)) {
    echo "Sua mensagem foi enviada com sucesso!";
  } else {
    echo "Erro ao enviar a mensagem. Tente novamente.";
  }
} else {
  echo "Método de envio inválido.";
}
?>
