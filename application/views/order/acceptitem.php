<div class="inner_content_w3_agile_info">

    <div id="requestbills">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table" >
                    <tr class="warning">
                        <th>เวลาที่ทำการสั่งซื้อ</th>
                        <th>ดูสินค้า</th>

                    </tr>

                    <tr v-for="item in requestbills">
                        <th>{{item.requestbill_time}}</th>
                        <th>
                            <button v-on:click="view(item.requestbill_pk)" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                ดูสินค้า
                            </button>
                        </th>

                    </tr>
                </table>
            </div>


        </div>


        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">สินค้าในบิล</h4>

                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table" >
                            <tr class="warning">
                                <th>ชื่อสินค้า</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                                <th>สถานที่</th>
                                <th>เวลาที่ต้องการ</th>

                            </tr>

                            <tr v-for="item in items">
                                <th>{{item.name}}</th>
                                <th>{{item.item_number}}</th>
                                <th>{{item.price}}</th>
                                <th>{{item.item_place}}</th>
                                <th>{{item.item_before}}</th>
                            </tr>
                        </table>
                        ยืนยันการรับสินค้า
                        <input type="checkbox" id="checkbox" v-on:click="update()">
                        <label for="checkbox">false</label>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button v-on:click="billdone()" type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<script>

    $('#insert').show();
    $('#table').show();
    $('#edit').hide();
    $('#form').hide();

    var data = new Vue({
        el : "#requestbills" ,
        data : {
            requestbills : [] ,
            items : [],
            requestbill_pk : ""

        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeRequestbillsBuyTrue')?>",function (data) {
                self.requestbills = data ;
            })


        } ,
        methods : {

            view : function (requestbill_pk) {
                this.requestbill_pk=requestbill_pk;
                $.post("<?php echo site_url('QueryJSON/jsonEncodeItemsfromBill')?>",{requestbill_pk:requestbill_pk});
                alert("ดูสินค้า");
                var self=this;
                $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeItems')?>",function (data) {
                    self.items = data ;
                });

            } ,

            billdone : function () {

                $.post("<?php echo site_url('InsertData/getbills')?>");

            } ,

            update : function () {

                $.post("<?php echo site_url('UpdateData/updateAcceptbill_status')?>",{requestbill_pk:this.requestbill_pk});
                for (var i in this.items){
                    $.post("<?php echo site_url('InsertData/getstocks')?>",{name:this.items[i].name,item_number:this.items[i].item_number});
                }

                location.reload();

            } ,


        }

    })

</script>

