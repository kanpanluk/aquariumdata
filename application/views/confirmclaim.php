<div class="inner_content_w3_agile_info">

    <div id="confirmbills">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table" >
                    <tr class="warning">
                        <th>หมายเลขสินค้า</th>
                        <th>จำนวนครั้งที่ส่งประกัน</th>
                        <th>ยืนยันใบประกันสินค้า</th>

                    </tr>

                    <tr v-for="item in claims">
                        <th>{{item.item_pk}}</th>
                        <th>{{item.item_claimnumber}}</th>
                        <th>
                            <input type="checkbox" id="checkbox" v-on:click="update(item.item_pk)">
                            <label for="checkbox">false</label>
                        </th>

                    </tr>
                </table>
            </div>


        </div>




    </div>

</div>

<script>


    var data = new Vue({
        el : "#confirmbills" ,
        data : {
            claims : [] ,
            item_pk : ""


        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeClaims')?>",function (data) {
                self.claims = data ;
            })


        } ,
        methods : {

            update : function (item_pk) {

                $.post("<?php echo site_url('UpdateData/confirmClaims')?>",{item_pk:item_pk});
                location.reload();
            } ,


        }

    })

</script>

