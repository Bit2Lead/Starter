import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';

class Header extends React.Component{
  render(){
    return (
        <div className="text-center">
          <Link className="border border-outline p-2" to="login">Login</Link>
          <a className="border border-outline p-2" href="/register">Register</a>
        </div>
    );
  }
}

export default Header;