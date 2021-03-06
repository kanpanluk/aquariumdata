<div class="inner_content_w3_agile_info">

    <div id="confirmbills">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table" >
                    <tr class="warning">
                        <th>เวลาที่ทำการสั่งซื้อ</th>
                        <th>ดูสินค้า</th>
                        <th>ยืนยันใบสั่งซื้อสินค้า</th>
                        <th>ลบ</th>

                    </tr>

                    <tr v-for="item in requestbills">
                        <th>{{item.requestbill_time}}</th>
                        <th>
                            <button v-on:click="view(item.requestbill_pk)" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                ดูสินค้า
                            </button>
                        </th>
                        <th>
                            <input type="checkbox" id="checkbox" v-on:click="update(item.requestbill_pk)">
                            <label for="checkbox">false</label>
                        </th>
                        <th>
                            <button v-on:click="del(item.requestbill_pk)" class="btn btn-danger" >
                                ลบ
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


    var data = new Vue({
        el : "#confirmbills" ,
        data : {
            requestbills : [] ,
            items : [],
            requestbill_pk : ""

        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeUnconfirmbills')?>",function (data) {
                self.requestbills = data ;
            })


        } ,
        methods : {

            view : function (requestbill_pk) {

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

            update : function (requestbill_pk) {

                $.post("<?php echo site_url('UpdateData/confirmRequestbills')?>",{requestbill_pk:requestbill_pk});
                location.reload();
            } ,

            del : function (requestbill_pk) {
                alert("ทำการลบใบสั่งนี้");
                $.post("<?php echo site_url('DeleteData/deleterequestbills')?>",{requestbill_pk:requestbill_pk});
                location.reload();
            } ,


        }

    })

</script>

