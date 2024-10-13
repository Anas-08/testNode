import React from 'react'

const Cart = ({cart, removeFromCart}) => {
    let total = 0
    cart.forEach((item)=>{
       total += item.productPrice
    })
    console.log(total)
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
                        <h3>Price : {item.productPrice} </h3>
                        <h3>Quantity : {item.ProductQuantity} </h3>
                        <button onClick={()=>removeFromCart(item._id)}>Remove To Cart</button>
                    </div>
                ))
            )
        }

    </>
  )
}

export default Cart
