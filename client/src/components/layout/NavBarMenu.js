import React from 'react'
import Navbar from 'react-bootstrap/Navbar'
import Nav from 'react-bootstrap/Nav'
import bookLogo from '../../assets/logo.svg'
import logoutIcon from '../../assets/logout.svg'
import Button from 'react-bootstrap/Button'
import { Link } from 'react-router-dom'
import { AuthContext } from '../../contexts/AuthContext'
import { useContext } from 'react'

const NavBarMenu = () => {
    const{authState: {user:{username}}, logoutUser} = useContext(AuthContext)

    const logout =()=>logoutUser()

    return (
        <Navbar expand='lg' bg='primary' variant='dark' className='shadow'>
            <Navbar.Brand className='font-weight-bolder text-while'>
                <img src={bookLogo} alt="bookLogo" width="32" height="32"/>
                Sách cũ
            </Navbar.Brand>
            <Navbar.Toggle aria-aria-controls='basic-navbar-nav'/>
            <Navbar.Collapse id='basic-navbar-nav'>
                <Nav className='mr-auto'>
                    <Nav.Link className = 'font-weight-bolder text-white' to='/dashboard' as={Link}>
                        Trang chủ
                    </Nav.Link>
                    <Nav.Link className = 'font-weight-bolder text-white' to='/about' as={Link}>
                        Giỏ hàng
                    </Nav.Link>
                </Nav>

                <Nav>
                    <Nav.Link className ='font-weight-bolder text-white' disabled>
                        Welcome {username}
                    </Nav.Link>
                    <Button variant='secondary' className='font-weight-bolder text-white' onClick={logout}>
                        <img src={logoutIcon} alt="logoutIcon" width="32" height="32" className="mr-2" />
                        Logout
                    </Button>
                </Nav>
            </Navbar.Collapse>

        </Navbar>
    )
}

export default NavBarMenu
