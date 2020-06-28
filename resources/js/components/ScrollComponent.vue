<template>
  <div class="content">
    <div class="items"> 
      <table border = "1">  
      <thead>
        <tr>
        <th>連番</th>
        <th>商品ID</th>
        <th>商品コード</th>
        <th>サイズ</th>
        <th>通常価格</th>
        <th>割引価格</th>
        <th>在庫フラグ</th>
        </tr>
        </thead>
        <tbody>
       <tr v-for="(item, itemIndex) in items">
        <td>{{itemIndex + 1}}</td>
        <td>{{item.product_id}}</td>
        <td>{{item.ts_id}}</td>
        <td>{{item.ts_size}}</td>
        <td>{{item.ts_base_price}}</td>
        <td>{{item.ts_normal_price}}</td>
        <td>{{item.ts_inventory}}</td>
        </tr>
        </tbody>
        </table>
    </div>    
    <!-- ローディングアニメーション -->
    <div class="loading-animation" v-if="itemLoading">
      <img src="https://www.asus.com/support/images/support-loading.gif" alt="">
    </div>
  </div>
</template>

<script>
  export default {
    data: () => ({
      itemLoading: false,
      load: true,
      page: 1,
      items: [],
    }),

    mounted(){
      this.clearVar()
      window.onscroll = () => {
        let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight == document.documentElement.offsetHeight;
        if (bottomOfWindow) this.getItems();
      };
      this.getItems()
    },

    methods: {
      clearVar() {
        this.itemLoading = false
        this.load = true
        this.page = 1
        this.items = []
      },
      async getItems() {
        if (this.load) { //全体の読み込み
          if (!this.itemLoading) { //読み込み中は読み込めないようにする
            this.itemLoading = true
            try {
              const response = await axios.get('/items?page=' + this.page)
              if (response.data.items.last_page == this.page) this.load = false
              if (response.data.items.data) {
                await response.data.items.data.forEach((n,i) => {
                  this.items.push(n)
                })
              }
              this.page += 1
            } catch (e) {
              console.log(e.response)
              this.load = false
              this.itemLoading = false
            } finally {
              this.itemLoading = false
            }
          }
        }
      },
    }
  }
</script>

<style scoped>
table thead{
    position:sticky
}
</style>]