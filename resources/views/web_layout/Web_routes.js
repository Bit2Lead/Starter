import React from 'react';
import ReactDOM from 'react-dom';
import Header from './Header';
import Test from '../admin_layout/Test';
import Login from '../admin/signin/Login';
import { BrowserRouter as Router, Route, Routes, Link} from 'react-router-dom';

class Web_routes extends React.Component 
{
	render()
	{
		return (
			<Router>
                <>
                <Header />
                <Routes>
                    <Route exact path="/login" element={<Login />} />
                    <Route exact path="/admin/dashboard" element={<Test />} />
                </Routes>
                </>
            </Router>
		);
	}
}

export default Web_routes;

if(document.getElementById('web_template'))
{
	ReactDOM.render(<Web_routes/>, document.getElementById('web_template'));
}