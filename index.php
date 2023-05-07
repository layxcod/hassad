<?php
// Initialize the session
session_start();
// Include config file

require_once "config.php";
?>
    </div>
<?php include("header.php"); ?>

<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                        <li data-target="#slider-carousel" data-slide-to="3"></li>
                        <li data-target="#slider-carousel" data-slide-to="4"></li>
                    </ol>


                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span class="fa fa-pagelines" aria-hidden="true"></span>HASSAD</h1>
                                <h2>حصاد تضمن لك الافضل دائمًا</h2>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>-->
                                <!--<button type="button" class="btn btn-default get">احصل عليها الآن</button>-->
                            </div>
                            <div class="col-sm-6">
                                <img src="image/8457.jpg_wh860.jpg" style="height: 27rem;" class="girl img-responsive" alt="" />
                                <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span class="fa fa-pagelines" aria-hidden="true"></span>  HASSAD</h1>
                                <h2>ادعم المزارع الصغيرة والمتناهية الصغر معنا</h2>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>-->
                                <!--<button type="button" class="btn btn-default get">احصل عليها الآن</button>-->
                            </div>
                            <div class="col-sm-6">
                                <img src="image/farms.jpg" style="height: 27rem;" class="girl img-responsive" alt="" />
                                <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span class="fa fa-pagelines" aria-hidden="true"></span> HASSAD </h1>
                                <h2>يمكنك جدولة مشترياتك الاسبوعية والشهرية معنا!</h2>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>-->
                                <!--<button type="button" class="btn btn-default get">احصل عليها الآن</button>-->
                            </div>
                            <div class="col-sm-6">
                                <img src="image/34780461-500x500.jpg" style="height: 27rem;" class="girl img-responsive" alt="" />
                                <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span class="fa fa-pagelines" aria-hidden="true"></span> HASSAD </h1>
                                <h2>جرب معنا زيارة المزارع وتجربة قطف الثمار والزراعة وغيرها</h2>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>-->
                                <!--<button type="button" class="btn btn-default get">احصل عليها الآن</button>-->
                            </div>
                            <div class="col-sm-6">
                                <img src="image/950_86805fee94.jpg" style="height: 27rem;" class="girl img-responsive" alt="" />
                                <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                            </div>
                        </div>


                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-left"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>الأقسام</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="products.php?type=1">المنتجات</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="farms.php?type=1">المزارع</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="farms.php?type=1">جدولة المنتجات</a></h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="farmer life.php">تجربة المزارع</a></h4>
                            </div>
                        </div>

                    </div>
                    <!--/category-products-->

                    <!--brands_products-->
                    <!--<div class="brands_products">
                            
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                    <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                                </ul>
                            </div>
                        </div>-->
                    <!--/brands_products-->
                    <!--price-range-->
                    <!--<div class="price-range">
                            <h2>نطاق السعر</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 600</b> <b class="pull-right">$ 0</b>
                            </div>
                        </div>-->

                    <!--/price-range-->

                    <!--shipping-->
                    <!--<div class="shipping text-center">
                            <img src="" alt="" />
                        </div>-->
                    <!--/shipping-->

                </div>
            </div>

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">المنتجات الاحدث</h2>

<?php
$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 9";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $count++;
?>
        <div class="col-sm-4 padding-right">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="<?php echo $row['image']; ?>" alt="" />
                        <h2>ريال<?php echo $row['price']; ?></h2>
                        <p><?php echo $row['name']; ?></p>
                        <p><?php echo $row['about']; ?></p>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
                            <input type="hidden" name="u_id" value="<?php if (isset($_SESSION["id"])) {
                                                                        echo $_SESSION["id"];
                                                                    } ?>">
                            <button type="submit" class="btn btn-default add-to-cart" name="add_item_to_cart_from_details"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</button>
                            <!--<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>-->
                        </form>
                    </div>
                    <!--<div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>ريال</h2>
                                    <p>اسم المنتج</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>
                            </div>-->
                </div>
                <form action="favorite.php" method="post">
                    <input type="hidden" name="p_id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="u_id" value="<?php if (isset($_SESSION["id"])) {
                                                                echo $_SESSION["id"];
                                                            } ?>">
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified" style="text-align: center;">
                            <!--<li><button type="submit" name="add_item_to_favorite" id="add_item_to_favorite"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</button></li>-->
                            <!--<a href="cart.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>-->
                            <button type="submit" class="btn btn-default add-to-cart" name="add_item_to_favorite" style="margin-top: 25px;"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</button>

                            <!--<li><a href="#"><button type="submit" name="add_item_to_favorite" style="visibility: hidden; width: 100%;"></button><i class="fa fa-plus-square"></i>أضف إلى المفضلة</a></li>-->
                        </ul>
                    </div>
                </form>

                <!--<div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>أضف إلى المفضلة</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>-->
            </div>
        </div>

<?php
    }
}

// Close connection
$conn->close();
?>


</div>
<!--features_items-->

<!--category-tab-->
<!--
    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tshirt" data-toggle="tab">منتجات</a></li>
                <li><a href="#blazers" data-toggle="tab">المزارع</a></li>
                <li><a href="#sunglass" data-toggle="tab">جدولة المشتريات</a></li>
                <li><a href="#kids" data-toggle="tab">تجربة المزارع</a></li>
            </ul>
        </div>


    <!--features_items-->

    <div class="category-tab">
        <!--category-tab-->
        <div class="col-sm 8">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tshirt" data-toggle="tab">خضار</a></li>
                <li><a href="#blazers" data-toggle="tab"> فواكة</a></li>
                <li><a href="#sunglass" data-toggle="tab">منتجات الألبان</a></li>
                <li><a href="#kids" data-toggle="tab">اللحوم </a></li>
                <li><a href="#poloshirt" data-toggle="tab">العسل</a></li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/image.jpg" alt="" />
                                <h2>7 ريال</h2>
                                <p>شمندر</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/AP9jxUwY9j04BYT9nN0jkqkMG3ML9U00fTWssblK.jpg" alt="" />
                                <h2>2 ريال</h2>
                                <p>شبت</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/zahrah.png" alt="" />
                                <h2>10 ريال</h2>
                                <p>زهرة</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/coo.png" alt="" />
                                <h2>5 ريال</h2>
                                <p>كوسة</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="blazers">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/orange_valencia__1_600x.png" alt="" />
                                <h2>6 ريال</h2>
                                <p>برتقال</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/78158_main.jpg_480Wx480H.jpg" alt="" />
                                <h2>5 ريال</h2>
                                <p>موز</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/Gwlrbdi7MpI6r0PUziQhHcNOyCokNWph1vqrE99F.jpg" alt="" />
                                <h2>4 ريال</h2>
                                <p>فراولة</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/1618988.jpg" alt="" />
                                <h2>3 ريال</h2>
                                <p>تفاح</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="sunglass">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/355578.jpg" alt="" />
                                <h2>2 ريال</h2>
                                <p>لبن</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/20201110132619701.jpg" alt="" />
                                <h2>5 ريال</h2>
                                <p>حليب ماعز</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/chesse.jpg" alt="" />
                                <h2>4 ريال</h2>
                                <p>جبنة ماعز</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/Kalzium-Milch-1024x664.jpg" alt="" />
                                <h2>6 ريال</h2>
                                <p>حليب بقر</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="kids">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/mafrom.jpg" alt="" />
                                <h2>55 ريال</h2>
                                <p>لحم مفروم</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/243113fd-6e8d-4c2c-9a86-05f7c8165299.jpg" alt="" />
                                <h2>100 ريال</h2>
                                <p>لحم حاشي</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/5139_1.jpg" alt="" />
                                <h2>120 ريال</h2>
                                <p>لحم حاشي</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/cheken.jpg" alt="" />
                                <h2>15  ريال</h2>
                                <p>دجاج</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="poloshirt">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/imagehoney.jpg" alt="" />
                                <h2>50</h2>
                                <p>عسل الملكة</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/1021342340_582-103-2350-2048_1920x0_80_0_0_0a33c32792dcee07f61eea12422cdb1f.jpg" alt="" />
                                <h2>40 ريال</h2>
                                <p>عسل الناعور</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/blackhoney.jpeg" alt="" />
                                <h2>20 ريال</h2>
                                <p>عسل اسود</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="image/c77ad7815c0c5e6757e6eb23543409e1.png" alt="" />
                                <h2>40 ريال</h2>
                                <p>عسل طبيعي</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">المنتجات الموصى بها</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="image/c77ad7815c0c5e6757e6eb23543409e1.png" alt="" />
                                    <h2>40 ريال</h2>
                                    <p>عسل طبيعي</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="image/CUCUMBER-SAUDI-KG.png" alt="" />
                                    <h2>4 ريال</h2>
                                    <p>خيار</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="image/207254.jpg" alt="" />
                                    <h2>4 ريال</h2>
                                    <p>طماطم</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="image/zahrah.png" alt="" />
                                    <h2>10 ريال</h2>
                                    <p>زهرة</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="image/USPumpkin-500x500.png" alt="" />
                                    <h2>6 ريال</h2>
                                    <p>قرع امريكي</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="image/bagdons.jpg" alt="" />
                                    <h2>2 ريال</h2>
                                    <p>بقدونس</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel"
                data-slide="prev">
                <i class="fa fa-angle-right"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel"
                data-slide="next">
                <i class="fa fa-angle-left"></i>
            </a>
        </div>
    </div>
                    

                </div>
                <!--features_items-->

                <!--category-tab-->
                <!--
                    <div class="category-tab">
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tshirt" data-toggle="tab">المنتجات</a></li>
                                <li><a href="#blazers" data-toggle="tab">المزارع</a></li>
                                <li><a href="#sunglass" data-toggle="tab">جدولة المشتريات</a></li>
                                <li><a href="#kids" data-toggle="tab">تجربة المزاراع</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="tshirt" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/p10.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/p10.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/p10.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/p10.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="blazers" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/pn1.png" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/pn1.png" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/pn1.png" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/pn1.png" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="sunglass" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/t1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/t1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/t1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/t1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="kids" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/m2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/m2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/m2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/m2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="poloshirt" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/z1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/z1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/z1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/products/z1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>اسم المنتج</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                <!--/category-tab-->

                <!--recommended_items-->
                <!--
                    <div class="recommended_items">
                        <h2 class="title text-center">المنتجات الموصى بها</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/products/p6.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>اسم المنتج</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/products/p17.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>اسم المنتج</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/products/p18.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>اسم المنتج</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/products/p13.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>اسم المنتج</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/products/p19.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>اسم المنتج</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/products/p20.jfif" alt="" />
                                                    <h2>$56</h2>
                                                    <p>اسم المنتج</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>أضف إلى السلة</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-right"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-left"></i>
                              </a>
                        </div>
                    </div>
                    -->
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>


    <footer id="footer"><!--Footer-->

<!--<div class="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="companyinfo">
                    <h2><span>e</span>-shopper</h2>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="footer-widget" style="margin-bottom: 10px;">
    <div class="container">
        <div class="row">

            <div class="col-sm-4">
                <div class="companyinfo" style="margin-top: 5px;">
                    <h2 style="font-size: 38px;"><span class="fa fa-pagelines" aria-hidden="true"></span> حصاد</h2>
                    <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>-->
                </div>
            </div>
<div class="col-sm-4">
    <div class="single-widget">
        <h2>تسوق سريع</h2>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="products.php">المنتجات</a></li>
            <li><a href="farms.php">المزارع</a></li>
            <li><a href="farms.php">جدولة المشتريات</a></li>
            <li><a href="farmer life.php">تجربة حياة المزارع</a></li>
        </ul>
    </div>
</div>
<a class="" href="#recommended-item-carousel" data-slide="prev">
   <i class="fa fa-angle-right"></i>
 </a>
 <a class="" href="#recommended-item-carousel" data-slide="next">
   <i class="fa fa-angle-left"></i>
 </a>
</div>
</div>
-->
<!--/recommended_items-->

</div>
</div>
</div>
</section>

<?php include("footer.php"); ?>

