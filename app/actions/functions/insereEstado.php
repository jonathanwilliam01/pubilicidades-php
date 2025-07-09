<?php
if (isset($_POST['confirmarEst'])) {
    $descricao = trim($_POST['descricao']);
    $uf        = strtoupper(trim($_POST['uf']));

    // Verificação se já existe o estado cadastrado
    $selectEstados = "SELECT descricao FROM cad_estado WHERE descricao = :descricao";
    $stmt = $pdo->prepare($selectEstados);
    $stmt->execute([':descricao' => $descricao]);
    $estadoExistente = $stmt->fetch(PDO::FETCH_ASSOC); 

    if ($estadoExistente) {
        echo "<script>alert('⚠️ Este estado já foi cadastrado!');</script>";
    } else {
        $sql = 'INSERT INTO public.cad_estado (descricao, uf) VALUES (:descricao, :uf)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':descricao' => $descricao,
            ':uf'        => $uf
        ]);
        header('Location: ../../index.php');
        exit;
    }
}
?>
