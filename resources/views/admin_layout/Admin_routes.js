import React from 'react';
import ReactDOM from 'react-dom';
import Header from './Header';
import Test from './Test';
import Login from '../admin/signin/Login';
import { BrowserRouter as Router, Route, Routes, Link} from 'react-router-dom';


class Admin_routes extends React.Component {
    render(){
        return (
            <Router>
                <>
                <Header />
                <Routes>
                    <Route exact path="/admin/login" element={<Login />} />
                    <Route exact path="/admin/test" element={<Test />} />
                </Routes>
                </>
            </Router>
        );
    }
}

export default Admin_routes;

if(document.getElementById('admin_panel'))
{
	ReactDOM.render(<Admin_routes/>, document.getElementById('admin_panel'));
}