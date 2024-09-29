import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { add } from './Redux/CartSlice'
import { useDispatch } from 'react-redux'

const Home = () => {

    const [product, setProduct] = useState([])

    const dispatch = useDispatch()

   async function getAllProduct(){
        const res = await axios.get('https://fakestoreapi.com/products')
        console.log(res)
        console.log(res.data)
        setProduct(res.data)
    }
    useEffect(()=>{
        getAllProduct()
    },[])

    // handle add
    function handleAdd(singleProduct){
        dispatch(add(singleProduct))

    }

    return (
    <>
        <div style={{textAlign:'center'}}>
            <h1>Home Page</h1>    
        </div> 

        <div style={{border:'1px solid black',padding:'12px', display:'flex', alignItems:'center',justifyContent:'space-evenly', flexWrap:'wrap'}}>
            {
                product.map((data, index)=>(
                    <div key={data.id} style={{width:'300px',border : '1px solid black',padding:'12px', display:'flex',flexDirection:'column', alignItems:'center'}} >
                        <h3>{data.title}</h3>
                        {/* <h3>{data.description}</h3> */}
                        <h3>{data.price}</h3>
                        <h3>{data.category}</h3>

                        <button onClick={()=> handleAdd(data)} >Add To Cart</button>
                    </div>
                ))
            }

        </div>
    </>
  )
}

export default Home
