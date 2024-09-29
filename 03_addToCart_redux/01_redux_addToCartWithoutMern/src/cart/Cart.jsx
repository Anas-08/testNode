import React from 'react'
import { useDispatch, useSelector } from 'react-redux'
import { remove } from '../Redux/CartSlice'

const Cart = () => {
    const item = useSelector((state)=> state.cart)
    const dispatch = useDispatch()

    // remove
   function handleRemove(id){
        dispatch(remove(id))
    }
    
  return (
    <>
        <div>
            Cart Page    
        </div> 

        <div style={{border:'1px solid black',padding:'12px', display:'flex', alignItems:'center',justifyContent:'space-evenly', flexWrap:'wrap'}}>
            {
                item.map((data, index)=>(
                    <div key={data.id} style={{width:'300px',border : '1px solid black',padding:'12px', display:'flex',flexDirection:'column', alignItems:'center'}} >
                        <h3>{data.title}</h3>
                        {/* <h3>{data.description}</h3> */}
                        <h3>{data.price}</h3>
                        <h3>{data.category}</h3>

                        <button onClick={()=> handleRemove(data.id)} >Remove</button>
                    </div>
                ))
            }

        </div>
        
    </>
  )
}

export default Cart
