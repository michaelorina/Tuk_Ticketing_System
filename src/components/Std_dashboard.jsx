import React from 'react'

function Std_dashboard() {
  return (
    <div className="p-4">
        <div>

        </div>
        <div className="bg-[#008080] text-justify rounded-lg">
            <p className="font-semibold text-xl">Welcome Back Michael!</p>
            <p className="max-w-xs text-white">We are proud to annouce 100% service provision rate this week!</p>
        </div>
        <div className="flex flex-row p-4 space-x-10">
            <div className="h-56 border border-black rounded-lg flex-1">
                <p className="px-2">Latest Response</p>
                <form action="" >
                    <ul className="flex flex-col space-y-4 p-2">
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                    </ul>
                </form>
            </div>
            <div className="h-56 border border-black rounded-lg flex-1">
                <p className="px-2">Reminders</p>
                <form action="" >
                    <ul className="flex flex-col space-y-4 p-2">
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                        <li className="border border-black rounded-lg"><input type="text" className="w-full rounded-lg"/></li>
                    </ul>
                </form>
            </div>
        </div>
        <div className="p-4 mx-2">
            <p>Actions</p>
        </div>
        <div className="text-white flex justify-around ">

            <button className="bg-purple-300 rounded-lg shadow h-16 w-20 text-xl text-semibold">New Ticket</button>
            <button className="bg-emerald-800 rounded-lg shadow h-16 w-20 text-xl text-semibold">Previous Ticket</button>
            <button className="bg-rose-400 rounded-lg shadow h-16 w-20 text-xl text-semibold">Total Tickets</button>
        </div>
    </div>
  )
}

export default Std_dashboard