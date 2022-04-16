<?php
// require __DIR__."/vendor/autload.php";
// use App\CommonFx;
?>
<?php
require "assets/inc/leftcol.php"
?>

<div class="col-lg-6">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Books</li>
        </ol>
    </nav>
    <?php echo $post ?? ''; ?>
    <!-- pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            $total_pages = ceil($totalrec / $count);
            // echo $total_pages;
            if ($pages > 1) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($pages - 1) . "'>Previous</a></li>";
                // echo "<li class='page-item'><a class='page-link' href='?page=1'>1</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                if (abs($i - $pages) > 2) continue;
                if ($i == $pages) {
                    echo "<li class='page-item active'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
                }
            }
            if ($pages < $total_pages) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($pages + 1) . "'>Next</a></li>";
            }
            ?>
        </ul>
    </nav>

</div>
<div class="col-lg-2">

</div>
</div>
</div>

<?php include "assets/inc/footer.php"; ?>
</body>

</html>