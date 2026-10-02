<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM tb_siswa WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: indeX.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-blue {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Edit Data Siswa</h2>

        <form action="update.php" method="POST">

            <!-- Input Hidden untuk menyimpan Primary Key ID -->
            <input
                type="hidden"
                name="id"
                value="<?= $data['id']; ?>"
            >

            <div class="form-group">
                <label for="nis">NIS:</label>

                <input
                    type="text"
                    id="nis"
                    name="nis"
                    value="<?= $data['nis']; ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="<?= $data['nama']; ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan:</label>

                <select id="jurusan" name="jurusan">

                    <option
                        value="RPL"
                        <?= ($data['jurusan'] == 'RPL') ? 'selected' : ''; ?>
                    >
                        Rekayasa Perangkat Lunak
                    </option>

                    <option
                        value="TKJ"
                        <?= ($data['jurusan'] == 'TKJ') ? 'selected' : ''; ?>
                    >
                        Teknik Komputer &amp; Jaringan
                    </option>

                    <option
                        value="MM"
                        <?= ($data['jurusan'] == 'MM') ? 'selected' : ''; ?>
                    >
                        Multimedia
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label for="alasan">Alasan Masuk:</label>

                <textarea
                    id="alasan"
                    name="alasan"
                    rows="3"
                ><?= $data['alasan']; ?></textarea>
            </div>

            <button
                type="submit"
                class="btn btn-blue"
            >
                Simpan Perubahan
            </button>

            <a
                href="index.php"
                class="btn btn-secondary"
            >
                Batal
            </a>

        </form>

    </div>

</body>

</html>