<div class="inner_content_w3_agile_info">

    <div id="claim">

        <div class="row">
            <div id="table" class="col-md-8">
                <table class="table" >
                    <tr>
                        <th>เวลาที่ทำการสั่งซื้อ</th>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>เพิ่มใบประกัน</th>

                    </tr>

                    <tr v-for="item in items">
                        <th>{{item.requestbill_time}}</th>
                        <th>{{item.item_pk}}</th>
                        <th>{{item.name}}</th>
                        <th>
                            <button class="btn btn-primary" v-on:click="formclaim(item.item_pk,item.item_number)">ส่งใบประกันสินค้า</button>
                        </th>


                    </tr>
                </table>

            </div>

            <div class="col-md-4" id="edit">
                <div class="form-group" >
                    <div>
                        <input type="hidden" v-model="item_pk">
                    </div>
                    <div>
                        <input type="hidden" v-model="item_numbercheck">
                    </div>
                    <div>
                        <label>จำนวน</label><br>
                        <input type="text" v-model="item_number">
                    </div>

                    <br>
                    <button type="button" class="btn btn-primary" id="insert" v-on:click="addclaim()">ส่ง</button>
                </div>

            </div>


        </div>





    </div>

</div>

<script>

    $('#insert').show();
    $('#edit').hide();

    var data = new Vue({
        el : "#claim" ,
        data : {
            items : [],
            item_pk : "" ,
            item_number : "" ,
            item_numbercheck : ""


        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeClaimitem')?>",function (data) {
                self.items = data ;
            })


        } ,
        methods : {

            formclaim : function (item_pk,item_number) {

                $('#edit').show();

                this.item_pk=item_pk;
                this.item_number=item_number;
                this.item_numbercheck=item_number;
            } ,

            addclaim : function () {

                if(this.item_number>this.item_numbercheck)
                {
                    alert('จำนวนสินค้าไม่ถูกต้อง');
                    location.reload();
                }
                else
                {
                    $.post("<?php echo site_url('InsertData/getclaim')?>",{item_pk:this.item_pk,item_number:this.item_number});
                    location.reload();
                }
            }

        }

    })

</script>

