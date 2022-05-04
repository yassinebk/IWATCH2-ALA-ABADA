
<!--top sale-->
        <section id="top-sale">
            <div class="container py-5">
                <h4 class="font-rubik font-size-20">Top Sale</h4>
                <hr>
                
                <div class="owl-carousel owl-theme">
                <?php
                    foreach($product_array as $item) {
                ?>
                <div class="item py-2">
                        <div class="product font-rale">
                            <a href="<?php echo'../src/product.php?item_id='.$item['item_id'];?>"><img src="<?php echo '../' . $item['item_image'] ?>" alt="<?php echo $item['item_brand'] ?>"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name']?></h6>
                                <div class="price py-2">
                                    <span><?php echo $item['item_price']?>TND</span>
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
                <?php
                    }
                ?>
                </div>
            </div>
        </section>