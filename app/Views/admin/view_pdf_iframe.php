<!DOCTYPE html>
<html>
<head>
    <title>View PDF</title>
</head>
<body>
<!-- <iframe src="<?= base_url()?>/img/<?= $pdf_file ?>" frameborder="0" width="100%" height="500"></iframe></body> -->

<iframe src="<?= base_url('admin/view_pdf/' . $guru->id . '/ijazah') ?>" frameborder="0" width="100%" height="500"></iframe>
</html>