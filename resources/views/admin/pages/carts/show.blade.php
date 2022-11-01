<div class="card"  >
    <div class="card-header" style="background-color: rgb(54, 53, 53) ; color: white">
     <h4> Product</h4>
    </div>
    <ul class="list-group list-group-flush">
@foreach ($cart->data as $item )

      <li class="list-group-item"  style="text-align: center;">{{ $item->name }}</li>

      @endforeach
    </ul>
</div>
