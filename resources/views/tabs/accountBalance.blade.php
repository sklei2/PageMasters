<div>
    <b>Balance:</b>
    <span id="currentBalance" class="price">${{$user->roleInfo->first()->account}}</span>
    <button id="addToBalance" class="btn btn-info" data-toggle="modal" data-target="#addAccount">Add to Balance</button>
</div>
<div class="modal fade" id="addAccount" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add to Account</h4>
            </div>
            <form id="addAccountForm" action="#" onsubmit="addToAccount(parseFloat(document.getElementById('quantity').value), {{$user->roleInfo->first()->id}})">
            	<div class="modal-body">
	                <label for="quantitySelect">How much would you like to add?</label>
	                <input id="quantity" type="number" min="0" step="0.01" class="form-control" placeholder="123.45" aria-label="Quantity" required>
	            </div>
	            <div class="modal-footer">
	                <button class="btn btn-default" type="submit">
	                    Add To Account
	                </button>
	                <button type="button" class="btn btn-default" data-dismiss="modal" >
	                	Close
	                </button>
	            </div>
        	</form>           
        </div>
    </div>
</div>