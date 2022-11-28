<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS loja";

    if ($conn->query($sql) === TRUE) {
      mysqli_select_db($conn,'loja');
    } else {
      echo "Error creating database: " . $conn->error;
    }

    $criacao = array(

      "CREATE TABLE IF NOT EXISTS Clientes(
        id_cliente int(5) AUTO_INCREMENT NOT NULL,
        nome_completo varchar(100) NOT NULL,
        email varchar(250) NOT NULL,
        telefone varchar(15),
        adm bit,
        username varchar(25) NOT NULL,
        imagem int(5) not null,
        password varchar(20) NOT NULL,
        primary key (id_cliente)
      );",

      "CREATE TABLE IF NOT EXISTS Produtos(
        id_produto int(5) AUTO_INCREMENT NOT NULL,
        descricao varchar(100) NOT NULL,
        quantidade int NOT NULL,
        imagem int(5),
        promocao bit,
        promocao_valor int(3),
        preco decimal(10,2) NOT NULL,
        primary key (id_produto)
      );",

      "CREATE TABLE IF NOT EXISTS Pedidos(
        id_pedido int(5) AUTO_INCREMENT NOT NULL,
        id_cliente int(5) NOT NULL,
        date_time_pedido datetime NOT NULL,
        primary key (id_pedido)

      );",

      "CREATE TABLE IF NOT EXISTS ItensPedidos(
        id_itenspedidos int(5) AUTO_INCREMENT, 
        id_pedido int(5) NOT NULL,
        id_produto int(5) NOT NULL,
        quantidade int(5) NOT NULL,
        primary key (id_itenspedidos)    
      );",

      "CREATE TABLE IF NOT EXISTS Imagens(
        id_imagem int(5) AUTO_INCREMENT,
        nome_imagem varchar(100) not null,
        primary key (id_imagem)   
      );"
    );



     foreach ($criacao as $value) $conn->query($value); 

?>