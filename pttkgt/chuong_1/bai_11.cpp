#include<bits/stdc++.h>
using namespace std;
bool snt(int n)
{
	if(n<2) return false;    
	for(int i=2;i<n;i++)    
	{
		if(n%i==0) return false;
	}
	return true;  
}
int main()
{
	int n;
	cin>>n;
	for(int i=n;i>1;i--)
	{
		if(snt(i)==true)
		{
			cout<<i<<"";
		}
	}
}
