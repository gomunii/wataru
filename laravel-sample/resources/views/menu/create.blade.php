@section('content')
<?php
// Log::debug("NO,30".$menus);
// Log::debug("NO,31".$timer);
?>
<style>
  img {
    max-width:150px;
  }

  div{

    font-size: 20px;
  }
  h2 {
  font-family: 'ヒラギノ明朝 Pro W3', 'Hiragino Mincho Pro', 'Hiragino Mincho ProN', 'HGS明朝E', 'ＭＳ Ｐ明朝', serif;
  padding: 1rem 2rem;
  color: #fff;
  background: #000;
}

h2 span {
  background-image: -webkit-linear-gradient(315deg, #b8751e 0%, #ffce08 37%, #fefeb2 47%, #fafad6 50%, #fefeb2 53%, #e1ce08 63%, #b8751e 100%);
  background-image: linear-gradient(135deg, #b8751e 0%, #ffce08 37%, #fefeb2 47%, #fafad6 50%, #fefeb2 53%, #e1ce08 63%, #b8751e 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}


table{
  width: 100%;
  border-collapse: collapse;
}

table tr{
  background-image: linear-gradient(40deg, #fce043 0%, #fb7ba2 74%);
}

table tr:last-child *{
  border-bottom: none;
}

table th,table td{
  text-align: center;
  border: solid 2px #fff;
  color: white;
  padding: 10px 0;
}



table td{
  text-align: center;
  border-left: 1px solid #a8b7c5;
  border-bottom: 1px solid #a8b7c5;
  border-top:none;
  box-shadow: 0px -3px 3px 1px #eee inset;
  width: 15%;
  padding: 8px 0;
}

table td:last-child{
  border-right: 1px solid #a8b7c5;
}

table tr:last-child td:first-child {
  border-radius: 0 0 0 3px;
}

table tr:last-child td:last-child {
  border-radius: 0 0 3px 0;
}
</style>

<div class="container original-container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading"><h2><span>商品一覧 Menu</span></h2></div>
        <div class="panel-body">
          @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            </div>
          @endif

          <tbody>
          @foreach($menus as $menu)

          <form action="{{ route('ordres.createSave') }}" enctype="multipart/form-data" method="POST">
            @csrf
          <table class="table">
            <tr>
              <td>{{ $menu->name }}</td>
              <td>{{ $menu->price }}円</td>

              <input type="hidden" name="menu_id" value="{{ $menu->menu_id }}" />

              <td>
                <label for="">数量</label>
                <select name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select>
              </td>
              <td><img src="http://localhost:8010/storage/sample/{{ $menu->image }}"/></td>
              <td>
              <button type="submit" class="btn btn-primary" onclick="return confirm('本当に商品を購入しますか？');">この商品をカートに入れる</button>
              </td>
              <td>お届け予定時刻 {{ $timer->format('m-d H:i') }}</td>
            </tr>
          </table>
          </form>
          @endforeach
          <tbody>
          <!-- <form action="{{ route('ordres.createSave') }}" enctype="multipart/form-data" method="POST">
            @csrf
          <table class="table">
              <th>2</th>
              <td>アイス</td>
              <td>500円</td>
              <input type="hidden" name="menu_id" value=2 />
              <td>
                <label for="">数量</label>
                <select name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select>
              </td>
              <td><img src="http://localhost:8010/storage/sample/S__9789482.jpg"/></td>
              <td>
              <button type="submit" class="btn btn-primary">この商品をカートに入れる</button>
              </td>
            </table>
            </form>
          <form action="{{ route('ordres.createSave') }}" enctype="multipart/form-data" method="POST">
            @csrf
            </tr>
          <table class="table">
              <th>3</th>
              <td>ブリュレ</td>
              <td>800円</td>
              <input type="hidden" name="menu_id" value=3 />
              <td>
                <label for="">数量</label>
                <select name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select>
              </td>
              <td><img src="http://localhost:8010/storage/sample/S__9789483.jpg"/></td>
              <td>
              <button type="submit" class="btn btn-primary">この商品をカートに入れる</button>
              </td>
            </tr>
          </table>
          </form>
          <form action="{{ route('ordres.createSave') }}" enctype="multipart/form-data" method="POST">
            @csrf
          <table class="table">
              <th>4</th>
              <td>チップス</td>
              <td>450円</td>
              <input type="hidden" name="menu_id" value=4 />
              <td>
                <label for="">数量</label>
                <select name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select>
              </td>
              <td><img src="http://localhost:8010/storage/sample/messageImage_1661421091472.jpg"/></td>
              <td>
              <button type="submit" class="btn btn-primary">この商品をカートに入れる</button>
              </td>
            </table>
            </form> -->
            </div>
        </div>
      </nav>
    </div>
  </div>
</div>
