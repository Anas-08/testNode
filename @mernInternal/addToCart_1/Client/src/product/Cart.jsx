import React from 'react'

const Cart = ({cart, removeFromCart, updateCartQuantity}) => {
    let total = 0
    
    cart.forEach((item)=>{
       let price = item.productPrice
       let qty = item.quantity
       total += (price * qty)
    })

    console.log(total)

    function handleQuantity(id, quantity){
        if(quantity > 0){
            updateCartQuantity(id, quantity)
        }
    }

  return (
    <>
        <div style={{display : "flex", justifyContent : "space-between", alignItems : "center", padding:"12px"}}>
        <h2>My Cart</h2> 
        Total : { total }
        </div>

        <br />    
        <hr />    
        <br />    

        {
            cart.length === 0 ? (<h3>No Items in the cart</h3>) : (
                cart.map((item, index)=>(
                    <div key={index} style={{border : "1px solid black", padding : "12px", width : "350px", margin : "8px"}}>
                        <h3>Name : {item.productName} </h3>
                        <h3>Category : {item.productCategory} </h3>
                        <p>Quantity :  <input type="number" min="1" value={item.quantity} onChange={(e)=>handleQuantity(item._id, parseInt(e.target.value)) } /> </p>   
                        <h3>Price : {item.productPrice} </h3>
                        <h4>SubTotal : {item.productPrice * item.quantity} </h4>
                        <button onClick={()=>removeFromCart(item._id)}>Remove To Cart</button>
                    </div>
                ))
            )
        }

    </>
  )
}

export default Cart
