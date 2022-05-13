@extends('admin.admin-master')
@section('Jim Customer Create') active @endsection
@section('admin_content')







<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Add New Customer</span>
    </nav>

    <div class="sl-pagebody">
      <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="" style="height: 70px; width:70px;" alt="">
                                        <h5>ASD</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        500
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="" min="1">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </form>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        500
                                    </td>
                                    <td class="shoping__cart__item__close">
                                       
                                            <a href=""> <span class="icon_close">
                                            </span>
                                            </a>
                                        
                                    </td>
                                </tr>
                           
                            </tbody>
                        </table>
                    </div>

</div>

<!--================================-->



    
@endsection