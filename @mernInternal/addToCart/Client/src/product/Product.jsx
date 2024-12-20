import React, { useEffect, useState } from 'react'
import axios from 'axios'

const Product = ({addToCart}) => {
    const [product, setProduct] = useState([])

    async function getAllProduct(){
        const res = await axios.get("http://localhost:3001/products")
        console.log(res)
        console.log(res.data.value)
        setProduct(res.data.value)

    }

    useEffect(()=>{
        getAllProduct()
    },[])

  return (
    <>
        <h1>Product</h1> 

        <br />  
        <hr />  
        <br />
    <div style={{display : "flex", flexWrap : "wrap", justifyContent : "space-around"}}>
        {
            product.map((item, index)=>(
                <div key={index} style={{border : "1px solid black", padding : "12px", width : "350px", margin : "8px"}}>
                    <h3>Name : {item.productName} </h3>
                    <h3>Category : {item.productCategory} </h3>
                    <h3>Price : {item.productPrice} </h3>
                    {/* <h3>Quantity : {item.ProductQuantity} </h3> */}
                    <button onClick={()=>addToCart(item)}>Add To Cart</button>
                </div>
            ))
        }  
    </div> 
    </>
  )
}

export default Product
