import { Route, Routes } from 'react-router-dom'

import Home from './Home'
import InsertForm from './FormRegistration/InsertForm'
import Navbar from './Navbar'

function App() {
  
  return (
  <>
   <Navbar/>
    <Routes>
      <Route path='/' element={<Home/>}/>
      <Route path='/insertForm' element={<InsertForm/>} />


      <Route path='*' element={<Home/>}/>
    </Routes>
  </>
  )
}

export default App
