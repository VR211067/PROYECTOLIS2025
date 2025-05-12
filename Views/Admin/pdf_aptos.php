<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Donantes Aptos</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Donantes Aptos para Donar Sangre</h1>
    <p>Fecha de generación: <?= date('d/m/Y') ?></p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Tipo de Sangre</th>
                <th>Última Donación</th>
                <th>Sexo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($donantes as $donante): ?>
            <tr>
                <td><?= htmlspecialchars($donante['nombre']) ?></td>
                <td><?= htmlspecialchars($donante['telefono']) ?></td>
                <td><?= htmlspecialchars($donante['tipo_sangre']) ?></td>
                <td><?= htmlspecialchars($donante['ultima_donacion']) ?></td>
                <td><?= htmlspecialchars($donante['sexo']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
