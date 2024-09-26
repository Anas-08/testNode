import { Route, Routes } from 'react-router-dom'

import Home from './Home'
import Navbar from './Navbar'

import FormHome from './FormRegistration/FormHome'
import InsertForm from './FormRegistration/InsertForm'
import UpdateForm from './FormRegistration/UpdateForm'

function App() {
  
  return (
  <>
   <Navbar/>
    <Routes>

      <Route path='/' element={<Home/>}/>
      
      <Route path='question1' element={<FormHome/>} >
        <Route path='user' element={<InsertForm />} /> 
        <Route path=':id' element={<UpdateForm />} />
      </Route>

      <Route path='*' element={<Home/>}/>
    
    </Routes>
  </>
  )
}

export default App
