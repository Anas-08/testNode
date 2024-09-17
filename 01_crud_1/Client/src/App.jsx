import { Route, Routes } from 'react-router-dom'
import './App.css'
import Home from './Home'
import UpdateUser from './UpdateUser'
function App() {
  return (
   <>
      <Routes>
        <Route path="/" element={<Home/>} />
        <Route path="/updateUser/:id" element={<UpdateUser />} />
       
      </Routes>
   </>
  )
}
export default App
