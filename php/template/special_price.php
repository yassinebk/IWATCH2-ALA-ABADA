<?php
$brand_array=array_map(function($pro){return $pro['item_brand'];},$product_array);
$brand=array_unique($brand_array);
sort($brand);
if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['special_price_submit'])){
            // call method addToCart
            $Cart->addToCart($_SESSION['user_id'], $_POST['item_id']);
        }
    }


?>


<!--special price-->
        <section id="special-price">
            <div class="container">
                <h4>Special Price</h4>
                <div id="filters" class="button-group font-baloo font-size-16">
                    <button class="btn is-checked" data-filter="*">All Brand</button>
                    <?php foreach($brand as $b) { ?>
                    <button class="btn" data-filter=".<?php echo $b;?>"><?php echo $b;?></button>
                    <?php } ?>
                    
                </div>
                <div class="container">
                    <div class="grid" style="position: relative; height: 1404.8px;">

                        <?php foreach($product_array as $item) { ?>
                        <div class="grid-item border <?php echo $item['item_brand']; ?>" style="position: absolute; left: 0px; top: 0px;">
                            <div class="item py-2" style="width: 200px;">
                                <div class="product font-rale">
                                    <a href="<?php echo'../src/product.php?item_id='.$item['item_id'];?>"><img src="<?php echo '../' . $item['item_image'];?>" alt="<?php echo $item['item_name']; ?>"
                                            class="img-fluid"></a>
                                    <div class="text-center">
                                        <h6><?php echo $item['item_name']; ?></h6>
                                        <div class="price py-2">
                                            <span><?php echo $item['item_price']; ?>TND</span>
                                        </div>
                                      <form method="post" >
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart',$_SESSION['user_id'])) ?? [] )){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                            }
                            ?>
                            
                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>


                    </div>
                </div>
            </div>
            <br>
        </section>
        <!-- !Special Price -->

        </main>