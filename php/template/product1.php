<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['product_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :           
?>
<!--   product  -->
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo '../' . $item['item_image'];?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                            </div>
                            <div class="col">
                            <div class="col">
                            <form method="post" >
                            <input type="hidden" name="user_id" value="<?phpecho $_SESSION['user_id'] ;?>">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="product_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                            }
                            ?>
                            
                        </form>
                    </div>
                            
                    </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'];?></h5>
                        <small><?php echo $item['item_brand'];?></small>
                        <hr>


                        <div>
                            <h3>Price</h3>
                            <h2 class="font-size-20 text-danger"><?php echo $item['item_price'];?>TND </h2>
                        </div>
                        <!--    #policy -->
                        <div id="policy">
                            <br>
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck  border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">Daily Tuition <br>Deliverd</a>
                                </div>
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-rale font-size-12">2 Years <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Delivery by : Apr 28 - Mai 1</small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer -
                                424201</small>
                        </div>

                        <!-- product qty section -->
                        <br>
                        <div class="qty d-flex">

                            <h6 class="font-baloo">Quantity</h6>
                            <div class="px-4 d-flex font-rale">
                                <input type="number" data-id="pro1" class="qty_input border px-2 w-50 bg-light"
                                    value="1" placeholder="1" min="1">
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>



            </div>

            <div class="container py-5">
                <br> <br>
                <h6 class="font-rubik">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14"> <?php echo $item['item_name'];?> Watch <br> Functions: Date & Time -
                    Quartz movement - Water resistant to 3 Bar - Mineral glass - Strap material Leather - Dial <br>
                    color: Blue <br> Clasp type: Ardillon buckle <br> Dimensions: 43 x 11 mm <br> Warranty 2 years

            </div>
        </section>
            <?php   endif;
        endforeach; ?>