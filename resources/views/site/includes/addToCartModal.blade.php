<!-- Add Cart Modal -->
<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body add-cart-box text-center">
				{{-- <p>You've just added this product to the<br>cart:</p> --}}
				<h4 id="productTitle"></h4>
				<img src="" id="productImage" width="100" height="100" alt="adding cart image">

				<div class="variants mb-3 hidden text-left">
					<div class="cart-table-container">
						<table class="table table-cart">
							<thead>
								<tr>
									<th class="size-col">{{ t('Color', 'site') }}</th>
									<th class="price-col" style="width:10%">{{ t('Quantity','site') }}</th>
									<th class="price-col">{{ t('Subtotal','site') }}</th>
								</tr>
							</thead>
							<tbody>
								<td class="size-color-col">
									<select class="form-control" id="size-color-select">
										<option value="">{{ t('Select','site') }}</option>
									</select>
								</td>
								<td class="quantity-col">
									<input type="number" class="form-control" id="quantity-input" value="1" min="1" step="1">
								</td>
								<td class="price-col">
									<span id="price-span" data-price=""></span>
								</td>
							</tbody>
						</table>
					</div>
				</div>
				<div class="single-product mb-3 hidden text-left">
					<div class="cart-table-container">
						<table class="table table-cart">
							<thead>
								<tr>
									{{-- <th class="size-col">{{ t('Size/Color', 'site') }}</th> --}}
									<th class="price-col" style="width:10%">{{ t('Quantity','site') }}</th>
									<th class="price-col">{{ t('Subtotal','site') }}</th>
								</tr>
							</thead>
							<tbody>
								{{-- <td class="size-color-col">
									<select class="form-control" id="size-color-select">
										<option value="">{{ t('Select','site') }}</option>
									</select>
								</td> --}}
								<td class="quantity-col">
									<input type="number" class="form-control simple-quantity" id="quantity-input-single" value="1" min="1" step="1">
								</td>
								<td class="price-col">
									<span id="price-span-single" data-price=""></span>
								</td>
							</tbody>
						</table>
					</div>
				</div>
				<div class="btn-actions">
					<button class="btn-primary AddToCart" data-product-id="">{{ t('Add To Cart','site') }}</button>
					<a href="#"><button class="btn-primary btnCancelModal" data-dismiss="modal">{{ t('Cancel','site') }}</button></a>
				</div>
			</div>
		</div>
	</div>
</div>