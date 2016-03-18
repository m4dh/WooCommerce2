<div>
    <style type="text/css" scoped>
        form[form-target] {
            display:none;
        }
        form[form-target] input[type="submit"] {
            display:none;
        }
        img.mp {
            height: 60px;
        }
        img.blik {
            height: 35px;
        }
        label {
            cursor: pointer;
        }
    </style>
    
    <h3><?php echo $data['h3'] ?></h3>
    <p><?php echo $data['p'] ?></p>
    
    <?php $countStrategy = 0; ?>
    <?php foreach($data['hiddenFields'] as $keyR => $valR) : ?>
        <?php if($valR['active']) : ?>
            <p>
                <label>
                    <input type="radio" name="strategy" form-target="<?php echo $keyR; ?>">
                    <img class="<?php echo $keyR; ?>" src="<?php echo $valR['icon']; ?>">
                </label>
                <form form-target="<?php echo $keyR; ?>" method="post" action="<?php echo $data['action']; ?>">
                    <?php if('dotpay' === $keyR) : ?>
                        <link href="<?php echo $data['action']; ?>widget/payment_widget.min.css" rel="stylesheet">
                        <script type="text/javascript" id="dotpay-payment-script" src="<?php echo $data['action']; ?>widget/payment_widget.js"></script>
                        <script type="text/javascript">
                            var dotpayWidgetConfig = {
                                sellerAccountId: '<?php echo $valR['fields']['id']; ?>',
                                amount: '<?php echo $valR['fields']['amount']; ?>',
                                currency: '<?php echo $valR['fields']['currency']; ?>',
                                lang: '<?php echo $valR['fields']['lang']; ?>',
                                widgetFormContainerClass: 'my-form-widget-container',
                                offlineChannel: 'mark',
                                offlineChannelTooltip: true
                            };
                        </script>
                    <?php endif; ?>
                    
                    <?php foreach($valR['fields'] as $keyF => $valF) : ?>
                        <input type="text" value="<?php echo $valF; ?>" name="<?php echo $keyF; ?>">
                    <?php endforeach; ?>
                    
                    <?php if('dotpay' === $keyR) : ?>
                        <p class="my-form-widget-container"></p>
                    <?php endif; ?>
                        
                    <?php foreach($valR['agreements'] as $keyA => $valA) : ?>
                        <p>
                            <label>
                                <input type="checkbox" name="<?php echo $keyA; ?>" value="1" checked>
                                <?php echo $valA; ?>
                            </label>
                        </p>
                    <?php endforeach; ?>
                        
                    <p>
                        <input class="button" type="submit" value="<?php echo $data['submit']; ?>">
                    </p>
                </form>
            </p>
            
            <?php if($valR !== end($data['hiddenFields'])) : ?>
                <hr>
            <?php endif; ?>
            
            <?php $countStrategy++; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
