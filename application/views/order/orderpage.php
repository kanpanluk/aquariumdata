<div class="inner_content_w3_agile_info">

    <div id="item">

        <div class="row">
            <div class="col-md-8">
                <table class="table" >
                    <tr>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานที่</th>
                        <th>เวลาที่ต้องการ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>

                    </tr>

                    <tr v-for="item in items">
                        <th>{{item.name}}</th>
                        <th>{{item.price}}</th>
                        <th>{{item.item_number}}</th>
                        <th>{{item.item_place}}</th>
                        <th>{{item.item_before}}</th>
                        <th><button v-on:click="edit(item.item_pk,item.name,item.price,item.item_number,item.item_place,item.item_before)">แก้ไข</button></th>
                        <th><button v-on:click="del(item.item_pk)">ลบ</button></th>
                    </tr>
                </table>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <div>
                        <label>ชื่อสินค้า</label><br>
                        <input type="text" v-model="name">
                    </div>

                    <div>
                        <label>จำนวน</label><br>
                        <input type="text" v-model="price">
                    </div>

                    <div>
                        <label>ราคา</label><br>
                        <input type="text" v-model="item_number">
                    </div>

                    <div>
                        <label>สถานที่</label><br>
                        <input type="text" v-model="item_place">
                    </div>
                    <div>
                        <label>เวลาที่ต้องการ</label><br>
                        <input type="date" v-model="item_before">
                    </div>
                    <br>
                    <button id="insert" v-on:click="insert()">เพิ่มสินค้า</button>
                    <button id="edit" v-on:click="update()">แก้ไข</button>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button id="billdone" v-on:click="billdone()">บิลเสร็จสิ้น</button>
            </div>
        </div>
    </div>

</div>

<script>

    $('#insert').show();
    $('#edit').hide();

    var data = new Vue({
        el : "#item" ,
        data : {
            items : [] ,
            item_pk : "",
            name : "" ,
            price : "" ,
            item_number : "" ,
            item_place : "" ,
            item_before : ""

        } ,
        mounted : function () {
            var self=this;
            $.getJSON("<?php echo site_url('QueryJSON/jsonEncodeItems')?>",function (data) {
                self.items = data ;
            })
        } ,
        methods : {
            insert : function () {
                $.post("<?php echo site_url('InsertData/getitems')?>",{name:this.name,price:this.price,item_number:this.item_number,item_place:this.item_place,item_before:this.item_before});
                location.reload();
            } ,

            edit : function (item_pk,name,price,item_number,item_place,item_before) {

                $('#insert').hide();
                $('#edit').show();

                this.item_pk=item_pk;
                this.name=name;
                this.price=price;
                this.item_number=item_number;
                this.item_place=item_place;
                this.item_before=item_before;
            } ,

            update : function () {
                $.post("<?php echo site_url('UpdateData/updateitems')?>",{item_pk:this.item_pk,name:this.name,price:this.price,item_number:this.item_number,item_place:this.item_place,item_before:this.item_before});
                location.reload();
            } ,

            del : function (item_pk) {

                $.post("<?php echo site_url('DeleteData/deleteitems')?>",{item_pk:item_pk});
                location.reload();
            } ,

            billdone : function () {

                $.post("<?php echo site_url('InsertData/getbills')?>");
                location.reload();
            } ,


        }

    })

</script>

