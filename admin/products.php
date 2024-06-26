<?php
include 'includes/header.php';
include 'phpbarcode/barcodelib.php';
$produCount = countRecords('products');
?>
<div class="container mt-5">
          <div class="row">
            <div class="col-md-6">
            <div class="badge bg-danger "><?= $produCount ?></div>
                <h1><i class="bi bi-shop-window"></i> Products </h1>
                
            </div>
          </div>
</div>
<div class="container-fluid px-4 mt-4   ">

<div class="card mb-4">
<div class="card-header text-bg-primary">
    categories
</div>
<div class="card-body">
<?php
$categories = getAll('categories');
?>
<select id="categorySelect" class="form-select" onchange="filterProductsByCategory()">
<option value="">select category</option>
    <?php
    if (mysqli_num_rows($categories) > 0) {
        foreach ($categories as $category) {
            echo '<option value="' . $category['id'] . '">' . $category['categoryName'] . '</option>';
        }
    } else {
        echo '<option value="">No categories found</option>';
    }
    ?>
</select>
</div>
</div>

    <div class="card mb-4">

        <div class="card-header text-bg-warning">
            <?php alertMessage() ?>
            <i class="fas fa-table me-1"></i>
            The Products

            <a href="products-create.php" class="btn btn-dark btn-sm text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg></a>

        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>barcode</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>barcode</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    
                        $categoryId = isset($_GET['category_id']) ? validate($_GET['category_id']) : '';

                        if (!empty($categoryId)) {
                            $products = getByCategory($categoryId);
                        } else {
                            $products = getAll('products');
                        }
                                            
                    if (mysqli_num_rows($products) > 0) { ?>
                        <?php foreach ($products as $product) : ?>
                            <?php
                            if (is_numeric($product['barcode'])) {
                                $generator = new \Picqer\Barcode\BarcodeGeneratorSVG();
                                $barcodeImage = $generator->getBarcode($product['barcode'], $generator::TYPE_CODE_128);
                            }
                            ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td>
                                    <img src="<?= $product['image']; ?>" style="width: 50px; height: 50px;" alt="">
                                </td>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['quantity'] ?></td>
                                <td><?= $product['price'] ?> $$</td>
                                <td><?= isset($barcodeImage) ? $barcodeImage : 'N/A' ?></td>


                                     <td><?php
                                    if ($product['status'] == 1) {
                                        echo '<span class="badge bg-danger">Hidden</span>';
                                    } else {
                                        echo '<span class="badge bg-success">Visible</span>';
                                    }
                                    ?></td>

                                <td>
                                    <a href="products-edit.php?id=<?= $product['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                    <a href="products-delete.php?id=<?= $product['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <tr>
            <td colspan="4">No Records found</td>

        </tr>
    <?php } ?>
    </div>
</div>
<?php include 'includes/footer.php' ?>

